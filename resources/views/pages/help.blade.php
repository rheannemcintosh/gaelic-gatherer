<x-admin-layout :hideButton="true" >
    <h1 class="text-2xl font-bold">Help</h1>
    <p>This help page aims to explain each part of the platform.</p>

    <!-- Contact -->
    <div class="mt-4">
        <h2 class="text-xl font-bold">Contact</h2>
        <p>If you experience any problems with the platform, or don't understand something, please contact Rheanne at <a href="mailto:rhm41@bath.ac.uk" class="text-blue-700 underline font-bold">rhm41@bath.ac.uk</a>.</p>
    </div>

    <!-- Study Progress Bar -->
    <div class="mt-4">
        <h2 class="text-xl font-bold">Study Progress Bar</h2>
        <p>A study progress bar is shown at the top of the page to allow you to easily see your progress through the study. There are three icons, which are described below.</p>
        <div class="grid grid-cols-3 gap-2 m-2">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-600 rounded-full flex justify-center items-center" disabled>
                    <span class="material-symbols-rounded text-sm text-white">
                        check_circle
                    </span>
                </div>
                <div class="pl-2 font-bold">
                    Completed Study Step
                </div>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 border-2 border-blue-600 rounded-full flex justify-center items-center shadow-md shadow-blue-400">
                    <span class="material-symbols-rounded text-sm text-blue-600">
                        target
                    </span>
                </div>
                <div class="pl-2 font-bold">
                    Current Study Step
                </div>
            </div>
            <div class="flex items-center">
                <div class="w-8 h-8 border-2 border-blue-600 rounded-full flex justify-center items-center">
                    <span class="material-symbols-rounded text-sm text-blue-600">
                        lock
                    </span>
                </div>
                <div class="pl-2 font-bold">
                    Locked Study Step
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <h2 class="text-xl font-bold">Study Steps</h2>
        <p>A brief explanation of each study step is described below, along with an estimated time and any requirements for each step.</p>
        <div class="m-2">
            @foreach (\App\Helpers\StudyHelper::STUDY_STEPS as $step)
                <div class="grid grid-cols-7 gap-1 mb-1">
                    <div class="bg-gray-100 rounded-lg col-span-2 font-bold flex items-center justify-center text-md">{{ $step['step'] }}</div>
                    <div class="border-4 border-gray-4 rounded-lg flex items-center justify-center italic">{{ $step['estimated_time'] }}</div>
                    <div class="col-span-4 border-4 border-gray-4 rounded-lg flex items-center justify-center text-sm p-4">{{ $step['description'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        <h2 class="text-xl font-bold">Units</h2>
        <p>There are 5 units on the platform. These have been designed to introduce you to the very basics of some of the most important topics when learning a new language.</p>
        <div class="m-2">
            @foreach ($units as $unit)
                <div class="grid grid-cols-7 gap-1 mb-1">
                    <div class="col-span-2 bg-gray-100 rounded-lg font-bold flex items-center justify-center text-md">{{ $unit->title }}</div>
                    <div class="col-span-5 border-4 border-gray-4 rounded-lg flex col-span-2 text-sm p-4 text-left">{{ $unit->description }}</div>
                </div>
            @endforeach
        </div>
        <h3 class="text-md font-bold mt-2">Progress Bar</h3>
        <p>A progress bar is displayed below each unit, so you can see how much of the unit has been completed. Examples of this are shown below.</p>
        <div class="m-2">
            <x-progress-bar :percentage="50" />
        </div>
    </div>
    <div class="mt-4">
        <h2 class="text-xl font-bold">Lessons</h2>
        <p>There are several lesson types within the platform, a short explanation of each lesson is available below.</p>
        <div class="m-2">
            @foreach ($lessonTypes as $type)
                <div class="grid grid-cols-7 gap-1 mb-1">
                    <div class="bg-gray-100 rounded-lg col-span-2 font-bold flex items-center justify-center text-md">{{ $type->name }}</div>
                    <div class="border-4 border-gray-4 rounded-lg flex items-center justify-center italic">{{ $type->required ? 'required' : 'not required'}}</div>
                    <div class="col-span-4 border-4 border-gray-4 rounded-lg flex items-center justify-center text-sm p-4">{{ $type->description }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-4">
        <h2 class="text-xl font-bold">Badges</h2>
        <p>You have been selected to be in the experimental group of this study. This means that you have access to badges as part of exploring the platform. You can view your badges at the top of the screen, and by hovering you can see the requirements for each badge. Additionally, when you complete a lesson, you will be shown any badges you have earned.</p>
        <div class="m-2">
            @foreach ($badges as $badge)
                <div class="grid grid-cols-7 gap-1 mb-1">
                    <div class="bg-gray-100 rounded-lg col-span-2 font-bold flex items-center justify-center text-md">{{ $badge->name }}</div>
                    <div class="border-4 border-gray-4 rounded-lg flex items-center justify-center italic py-2">
                        <img class="w-20 h-20" src="{{ asset('images/badges/' . $badge->icon) }}">
                    </div>
                    <div class="col-span-4 border-4 border-gray-4 rounded-lg flex items-center justify-center text-sm p-4">{{ $badge->description }}</div>
                </div>
            @endforeach
        </div>
    </div>
</x-admin-layout>
