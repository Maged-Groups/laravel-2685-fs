<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:3|max:200',
            'body' => ['required', 'min:20', 'max:200'],
            'post_status_id' => 'required|exists:post_statuses,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'لازم تكتب عنوان للبوست',
            'title.min' => 'ما يقلش عن 3 حروف لو سمحت',
            'post_status_id.exists' => "بطل تحايل مافيش النوع ده"
        ];
    }
}
