<?php

namespace App\Http\Requests\Order;

use App\Enums\OrderStatus;
use App\Enums\ProductStatus;
use App\Models\Order;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateOrderRequest extends FormRequest
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
            'quantity' => ['sometimes', 'numeric', "gte:1"],
            'status' => ['sometimes', new Enum(OrderStatus::class)],
            'total_cost' => ['sometimes', 'numeric', "gte:1"],
        ];
    }
}
