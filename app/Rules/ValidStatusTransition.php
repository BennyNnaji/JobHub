<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidStatusTransition implements Rule
{
    protected $validTransitions = [
        'submitted' => ['under_review', 'withdrawn'],
        'under_review' => ['shortlisted', 'not_selected' , 'withdrawn'],
        'shortlisted' => ['interview_scheduled', 'not_selected' , 'withdrawn'],
        'interview_scheduled' => ['interviewed', 'not_selected' , 'withdrawn'],
        'interviewed' => ['reference_check', 'not_selected' , 'withdrawn'],
        'reference_check' => ['offer_extended', 'not_selected' , 'withdrawn'],
        'offer_extended' => ['offer_accepted', 'not_selected' , 'withdrawn'],
        'offer_accepted' => ['onboarding', 'not_selected' , 'withdrawn'],
        'onboarding' => ['hired', 'not_selected' , 'withdrawn'],
        'hired' => [], // No further transitions after being hired
        'not_selected' => [], // No further transitions after not selected
        'withdrawn' => [], // No further transitions after being withdrawn
    ];

    protected $currentStatus;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return in_array($value, $this->validTransitions[$this->currentStatus]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid status transition.';
    }
}
