<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:user_table',
            'email' => 'required',
            'password' => 'required|min:5',
            're_pass' =>'required|min:5',
            'type'=> 'required',

            
        ];
    }

    public function messages(){
        return[
            //'name.required' => 'Name can not be empty',
            //'username' => 'Username can not be empty',
            'username' => 'Username already taken',
            //'email.required' => 'Email can not be empty',
            'email.regex' => 'Email is not valid',
            //'password.required' => 'Password can not be empty',
            'password.min' => 'Password must have minimum 5 characters',
            //'re_pass' => 'Password not confirmed',
            //'type' => 'You must enter your type'

            
        ];
    }
}
