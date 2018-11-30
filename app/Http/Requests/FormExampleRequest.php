<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormExampleRequest extends FormRequest
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
        return [
            'Name' => 'required|min:2|max:50',
            'Poster' => 'required',
        ];
    }
    public function messages()
    {
        $messages = [
            'Name.required' => 'Bat buoc phai co ten blog',
            'Name.min' => 'Ten blog phai co it nhat 2 ki tu',
            'Name.max' => 'Ten blog co nhieu nhat la 50 ki tu',
            'Poster.required' => 'Bat buoc phai co ten tac gia'
        ];
        return $messages;
    }
}
