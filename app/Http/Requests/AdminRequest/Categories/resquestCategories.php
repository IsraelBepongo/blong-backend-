<?php

namespace App\Http\Requests\AdminRequest\Categories;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class resquestCategories extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','min:3','unique:categories,name'],
            'color' => ['required','regex:/^#([a-f-A-F-0-9]{3}|[a-f-A-F-0-9]{6})$/','unique:categories,color']
        ];
    }
}
