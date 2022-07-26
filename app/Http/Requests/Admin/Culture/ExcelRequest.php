<?php

namespace App\Http\Requests\Admin\Culture;

use Illuminate\Foundation\Http\FormRequest;

class ExcelRequest extends FormRequest
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
            'excel_culture' => 'required|file'
        ];
    }

    public function messages() {
        return [
            'excel_culture.required' => 'Необходимо выбрать Excel файл',
            'excel_culture.file' => 'Необходимо выбрать Excel файл',
        ];
    }
}
