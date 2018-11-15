<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    public function __construct()
    {
        \App::setLocale('pl');
    }

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
        $user_id = $this->request->get('user_id');
        
        return [
            'email' => 'required|email|unique:users,email,' . $user_id,
            'password' => 'nullable|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password_confirm' => 'nullable|required_with:password|same:password',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'is_active' => 'required|in:0,1',
            'gender' => 'required|in:man,woman',
        ];
    }
}
