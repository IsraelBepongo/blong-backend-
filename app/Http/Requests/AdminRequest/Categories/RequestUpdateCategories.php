<?php

namespace App\Http\Requests\AdminRequest\Categories;

use App\Models\Categorie;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestUpdateCategories extends FormRequest
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

        $id = $this->route('Categorie') instanceof Categorie ? 
        $this->route('Categorie')->id : 
        $this->route('Categorie');

        return [
            'name' => ['string','min:3', Rule::unique('categories' , 'name')->ignore($id) ],
            'color' => ['regex:/^#([a-f-A-F-0-9]{3}|[a-f-A-F-0-9]{6})$/' , Rule::unique('categories' , 'color')->ignore($id)]
        ];
        
    }
}
