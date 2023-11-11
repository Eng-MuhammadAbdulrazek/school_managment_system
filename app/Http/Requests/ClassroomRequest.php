<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en'=> 'required',
            'name_ar'=> 'required',
            'Grade' => 'required',
        ];
    }
    public function messages(){
        return [
            'name_en.required' => trans('Grades_T.name_en_required'),
            'name_ar.required' => trans('Grades_T.name_ar_required'),
            

        ];
    }
}
