<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmployeeUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('id');
        return [
            "first_name" => "required|max:70",
            "last_name" => "required|max:70",
            "phone" => "required|max:15",
            "email" => "required|unique:employees,email,". $id ."|max:50",
            "work_hours" => "required|integer",
            "salary" => "required|integer",
        ];
    }

    /*
     * if validation fail return error
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
