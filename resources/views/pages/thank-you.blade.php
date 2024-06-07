<x-admin-layout :hideButton="true">
    <h1 class="text-2xl font-bold">Thank You for Completing the Study!</h1>
    <p class="pb-2">
        Thank you for your participation in the Gaelic Gatherer Study! Your time and contribution
        to this research are immensely appreciated. Your willingness to dedicate time and effort to
        this research is truly commendable and plays a crucial role in advancing knowledge
        retention in the field of language learning.
    </p>
    <h2 class="text-xl font-bold">Purpose and Rationale of the Study</h2>
    <p class="pb-2">
        The aim of the Gaelic Gatherer Study was to evaluate the effectiveness of gamified badges
        on knowledge retention among users of the Gaelic Gatherer application. By engaging with
        the platform and completing various tasks, you have provided valuable insights that will
        contribute to our understanding of how gamification impacts knowledge retention in
        language learning.
    </p>
    <h2 class="text-xl font-bold">Study's Findings</h2>
    <p class="pb-2">
        The study’s findings should be finalised by September 2024. If you would like to find out
        about the study’s findings, please contact <a href="mailto:rhm41@bath.ac.uk" class="text-blue-700 underline font-bold">rhm41@bath.ac.uk</a>.
    </p>
    <h2 class="text-xl font-bold">Right to Withdraw</h2>
    <p class="pb-2">
        As a participant in the Gaelic Gatherer Study, please remember that you have the right to
        withdraw from the study at any time, without penalty or consequence. Your decision will
        be respected, and any data collected up to the point of withdrawal will be handled
        confidentially and with utmost care. Any identifiable data will be removed, and the
        remainder of that data will be anonymised.
    </p>
    <h2 class="text-xl font-bold">
        Final Thanks
    </h2>
    <p class="pb-2">
        Once again, thank you for your invaluable contribution to the Gaelic Gatherer Study. If you
        have any further questions or concerns, please do not hesitate to contact us at
        <a href="mailto:rhm41@bath.ac.uk" class="text-blue-700 underline font-bold">rhm41@bath.ac.uk</a>.
    </p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="w-full my-4 flex items-center justify-center">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="justify-center bg-gradient-to-r from-blue-700 to-blue-500 px-8 py-4 rounded-lg shadow-md transition-all duration-200 ease-in-out transform hover:scale-105">
                    <span class="text-white font-bold">Log Out</span>

                </div>
            </a>
        </div>
    </form>
</x-admin-layout>
