<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;


class Valirequetsname implements Rule
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
            preg_match('/[a-zA-Z\s\p{L}]+/u', $value, $matches);

            return isset($matches[0]) && $matches[0] == $value;
            //return Str::contains($value, ' ');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute phải có dấu cách, không được chứa ký tự đặc biệt, ký tự số';
    }
}
