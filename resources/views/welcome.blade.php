<x-app-layout>
    @if (!config('app.study_live') && !config('app.study_closed'))
        <h1 class="text-center text-4xl font-bold text-blue-700 mb-4">COMING SOON!</h1>
        <div>
            <p class="text-center mb-4 text-lg font-bold">A study conducted by Rheanne McIntosh as part of her MSc in Computer Science at the University of Bath.</p>
            <p class="text-center mb-8 text-lg font-bold">If you would like to participate, please contact Rheanne at <a href="mailto:rhm41@bath.ac.uk" class="text-blue-500 underline">rhm41@bath.ac.uk</a>, to be notified when the study goes live.</p>
        </div>
        <div class="w-full bg-white shadow-md rounded-lg p-8">
            <h2 class="text-lg font-bold mb-2 text-center">Aim of the Study</h2>
            <p class="mb-6 text-center">The primary goal of this research is to assess how gamified badges influence the retention of knowledge acquired through the Gaelic Gatherer platform. By participating in this study, you will contribute valuable insights to understanding how gamification can enhance the knowledge retention of language learning.</p>

            <h2 class="text-lg font-bold mb-2 text-center">What Does the Study Involve?</h2>
            <p class="mb-6 text-center">Participants will explore an application called Gaelic Gatherer at their own pace, engaging with learning materials on key topics in Scottish Gaelic. They'll then provide some personal information before completing a small quiz on Scottish Gaelic, followed by quizzes one hour and two weeks later to measure knowledge retention.</p>

            <h2 class="text-lg font-bold mb-2 text-center">Who Can Participate?</h2>
            <p class="text-center mb-4">Individuals over 18 years old, residing in the UK, and without significant prior knowledge of Scottish Gaelic are eligible to participate.</p>
        </div>
    @elseif (config('app.study_live') && !config('app.study_closed'))
        <h1 class="text-center text-4xl font-bold text-blue-700 mb-4">The Study is now LIVE!</h1>
        <div>
            <p class="text-center mb-4 text-lg font-bold">A study conducted by Rheanne McIntosh as part of her MSc in Computer Science at the University of Bath.</p>
            <p class="text-center mb-8 text-lg font-bold">If you would like to participate, please contact Rheanne at <a href="mailto:rhm41@bath.ac.uk" class="text-blue-500 underline">rhm41@bath.ac.uk</a>, to be notified when the study goes live.</p>
        </div>
        <div class="">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-center">
                    <a href="{{ route('research-study') }}" class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                        <span class="text-white font-bold">Find Out More!</span>
                    </a>
                </div>
            </div>
        </div>
    @else
        <h1 class="text-center text-4xl font-bold text-blue-700 mb-4">The Study is now CLOSED!</h1>
        <div>
            <p class="text-center mb-4 text-lg font-bold">Thank you to everyone who participated in the study!</p>
            <p class="text-center mb-8 text-lg font-bold">If you would like to find out the results of the study, please contact Rheanne at <a href="mailto:rhm41@bath.ac.uk" class="text-blue-500 underline">rhm41@bath.ac.uk</a>.</p>
        </div>
    @endif
</x-app-layout>
