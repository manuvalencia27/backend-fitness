<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        
        return [
            'name' => 'required',
            'slug' =>'required|unique:products',
            'short_description'=>'required|min:10|max:100',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price'=>'numeric|nullable',
            'SKU' =>'required',
            'stock_status' =>'required',
            'quantity' => 'required|numeric',
            'image' => 'mimes:png',
            'tag_id' => 'nullable',
            'category_id'=>'required'
        ];
    }
}
