<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;

class ProductName implements Rule
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
        //Check name if value is null 
        return !Str::is($value, null);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $messages = [
            'name' => ':attribute cannot be blank.',
        ];
        
    }
}
