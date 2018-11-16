<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class ImportContactsRequest extends FormRequest
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
        return [
            'file' => 'required|mimeTypes:text/csv,text/plain,text/x-csv,application/vnd.ms-excel,application/csv,application/x-csv,text/comma-separated-values,text/x-comma-separated-values,text/tab-separated-values',
        ];
    }
}
