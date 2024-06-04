<?php

namespace App\Helpers;

class StudyHelper
{
    public const STUDY_STEPS = [
        [
            'step' => 'Initial Registration',
            'estimated_time' => '10 minutes',
            'description' => 'Read about the study, provide consent, and complete the registration form.'
        ],
        [
            'step' => 'Pre-Study Questionnaire',
            'estimated_time' => '5 minutes',
            'description' => 'Complete short questionnaire about your current motivation for Scottish Gaelic and your current knowledge of Scottish Gaelic.'
        ],
        [
            'step' => 'Explore the Platform',
            'estimated_time' => '30 minutes',
            'description' => 'Explore the platform at your own pace. However, please remember you can only access the platform once, and have to read the 5 overview lessons before you can move on.'
        ],
        [
            'step' => 'Post-Study Questionnaire',
            'estimated_time' => '5 minutes',
            'description' => 'Complete short questionnaire about your post study motivation for learning Scottish Gaelic, your relations to Scotland and any relation to Scottish Gaelic.'
        ],
        [
            'step' => 'Quiz 1 (Immediate)',
            'estimated_time' => '10 minutes',
            'description' => 'Complete the first knowledge retention quiz (consisting of 10 questions) to test your knowledge of Scottish Gaelic. This must be completed immediately after the post-study questionnaire.'
        ],
        [
            'step' => 'Quiz 2 (1 Hour)',
            'estimated_time' => '10 minutes',
            'description' => 'Complete the second knowledge retention quiz (consisting of 10 questions) to test your knowledge of Scottish Gaelic. This must be completed 1 hour after completing the first quiz.'
        ],
        [
            'step' => 'Quiz 3 (14 Days)',
            'estimated_time' => '10 minutes',
            'description' => 'Complete the final knowledge retention quiz (consisting of 10 questions) to test your knowledge of Scottish Gaelic. This must be completed 14 days after completing the first quiz.'
        ],
    ];
}
