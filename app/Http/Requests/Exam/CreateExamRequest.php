<?php


namespace App\Http\Requests\Exam;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateExamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'form_open_date' => 'required|date|date_not_past|unique:exam',
            'form_deu_date' => 'required|date_not_past|date_not_past_than_double_dustur:form_double_dustur_date|unique:exam',
            'form_double_dustur_date' => 'required|date_not_past|date_between:form_open_date,form_deu_date|unique:exam',
        ];
    }

    public function messages()
    {
        return [
            'date_not_past' => 'The :attribute must not be in the past.',
            'date_between' => 'The :attribute must between form open date and form deu date.',
            'date_not_past_than_double_dustur' => 'The :attribute must not be past then double dustur date.'
        ];
    }
}
