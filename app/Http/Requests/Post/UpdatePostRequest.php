<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|string|max:255|',
            'body' => 'required|string',
            'image' => 'sometimes|required|image|max:5120',
            'pinned' => 'required|boolean',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id',
        ];
    }
}