<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
     * @param $company
     * @return array
     */
    public function rules()
    {
        $id = $this->request->get('company_id');
        return [
            //
            'name' => 'required',
            'email' => 'required|unique:companies,email,' .$id,
            'website' => 'required|unique:companies,website,' .$id
        ];
    }
}
