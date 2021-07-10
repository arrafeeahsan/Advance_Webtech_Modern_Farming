<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            

            'uname' =>'required',
            'pass' => 'required'
        ];
    }

    public function messages(){
        return[
            //'name.required' => 'Name can not be empty',
            //'username' => 'Username can not be empty',
            'uname' => 'Username required!',
            //'email.required' => 'Email can not be empty',
            //'email.regex' => 'Email is not valid',
            //'password.required' => 'Password can not be empty',
            'pass' => 'Password required!',
            //'re_pass' => 'Password not confirmed',
            //'type' => 'You must enter your type'

            
        ];
    }
}
