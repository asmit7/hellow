<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Carbon;

class TimeBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $pickupdate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupdate->hour,$pickupdate->minute,$pickupdate->second);
        //when the restorent is open
        $earliestTime = Carbon::createFromTimeString('18:00:00');
        //when the restorent is close
        $lastTime = Carbon::createFromTimeString('23:00:00');
  
        return $pickupTime->between($earliestTime, $lastTime)? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'please choose the time between 18::00-23:00.';
    }
}
