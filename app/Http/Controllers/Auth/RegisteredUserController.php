<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ConsentHelper;
use App\Helpers\LessonHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserData;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if (isset($request->initial_consent_statement) == 0 || count($request->initial_consent_statement) !== count(ConsentHelper::CONSENT_STATEMENTS)) {
            return back()->withErrors(['initial_consent_statement' => 'You must agree to all statements.']);
        }

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'pre_study_motivation' => ['required', 'in:Highly Motivated,Moderately Motivated,Slightly Motivated,Not Motivated'],
            'scottish_gaelic_competency' => ['required', 'in:None,Beginner,Intermediate,Advanced,Fluent,Native Speaker']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'initial_consent' => true,
            'pre_study_motivation' => $request->pre_study_motivation,
            'scottish_gaelic_competency' => $request->scottish_gaelic_competency,
        ]);

        $userData = UserData::create([
            'user_id' => $user->id,
            'pre_study_motivation' => $request->pre_study_motivation,
            'pre_study_competency' => $request->scottish_gaelic_competency,
            'pre_study_completed_at' => now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        LessonHelper::assignLessonsToUsers();

        return redirect()->route('badges.assign');
    }

    /**
     * Download the participant information sheet PDF.
     */
    public function downloadParticipantInformationSheetPDF()
    {
        $filePath = storage_path('app/public/participant-information-sheet.pdf');

        return response()->download($filePath);
    }
}
