<?php

namespace App\Helpers;

class ConsentHelper
{
    /**
     * The consent statements that participants must agree to when registering.
     */
    public const CONSENT_STATEMENTS = [
        'I have been provided with information explaining what participation in this project involves.',
        'I know how to contact the researcher(s) if I have any questions or concerns.',
        'I have received satisfactory answers to any questions I have asked.',
        'I have received enough information about the project to make a decision about my participation.',
        'I understand that I am free to withdraw my consent to participate in the project at any time without having to give a reason for withdrawing.',
        'I understand the nature and purpose of the procedures involved in this project. These have been communicated to me on the information sheet on the previous page.',
        'I understand and acknowledge that the investigation is designed to promote scientific knowledge and that the University of Bath will use the data I provide only for the purpose(s) set out in the information sheet.',
        'I understand the data I provide will be treated as confidential, and that on completion of the project my name or other identifying information will not be disclosed in any presentation or publication of the research.',
        'I understand that my consent to use the data I provide is conditional upon the University complying with its duties and obligations under the Data Protection Act.',
        'I hereby fully and freely consent to my participation in this project.'
    ];
}
