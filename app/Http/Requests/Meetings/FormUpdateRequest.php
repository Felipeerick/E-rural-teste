<?php

namespace App\Http\Requests\meetings;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdateRequest extends FormRequest
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
            'meetingName' => 'min:4|max:24',
            'url' => 'min:8',
            'password' => 'min:5',
            'status' => 'required',
        ];
    }
}
