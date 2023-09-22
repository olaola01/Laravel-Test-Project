<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        $id = $this->request->get('employee_id');

        return [
            //
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:employees,email,' .$id,
            'phone' => 'required',
            'company_id' => 'required'
        ];
    }
}
