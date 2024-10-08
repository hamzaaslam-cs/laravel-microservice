<?php

namespace App\Http\Requests\Product;

use App\Enums\ProductStatus;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProductRequest extends FormRequest
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
            'name' => ['sometimes', 'string', 'unique:' . User::class],
            'quantity' => ['sometimes', 'numeric'],
            'price' => ['sometimes', 'numeric'],
            'status' => ['sometimes', new Enum(ProductStatus::class)],
        ];
    }
}
