<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\BadgeHelper;
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
            return back()
                ->withErrors(['initial_consent_statement' => 'You must agree to all statements.'])
                ->with([
                    'statusMessage' => 'Oops! This form has some errors. Please try again!',
                    'statusType'    => 'error',
                ]);
        }

        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if (
            (config('app.study_closed') || !config('app.study_live')) &&
            (in_array($request->email, config('app.study_override_emails')) === false)
        ){
            return redirect()
                ->route('welcome')
                ->with([
                    'statusMessage' => 'This study is currently closed. Please contact the study administrator for more information.',
                ]);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'initial_consent' => true,
        ]);

        UserData::create([
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()
            ->route('pre-study-questionnaire.show.consent')
            ->with([
                'statusMessage' => 'Success! Thank you for registering for the study!',
                'statusType'    => 'success',
            ]);
    }
}
