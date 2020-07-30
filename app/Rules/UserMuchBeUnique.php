<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DB;
class UserMuchBeUnique implements Rule
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
        return $value != "Lam Thai Gia Huy";
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'yo bro that admin name bro stop it';
    }
}
