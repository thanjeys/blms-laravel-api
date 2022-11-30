<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            // 'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'mobile' => 'required',
            'role_id' => 'required|exists:roles,id',
            'coordinator'=> 'required_if:role_id,1,2',
            'outside_leads' => 'required',
            'products' => 'required',
            'status' => 'required'
        ];
    }
}
