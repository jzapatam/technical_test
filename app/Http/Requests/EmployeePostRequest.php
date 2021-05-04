<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && auth()->user()->is_admin);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => [
                'required', 'max:256'
            ],
            'last_name' => [
                'required', 'max:256'
            ],
            'company_id' => [
                'required'
            ],
            'email' => [
                'required', 'email', Rule::unique((new Employee())->getTable())->ignore($this->route()->employee->id ?? null)
            ]
        ];
    }
}
