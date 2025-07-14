<?php

namespace App\Http\Requests\Order;

use App\Http\DTO\OrderDTO;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.count' => 'required|numeric',
        ];
    }



    public function getDTO()
    {
        return OrderDTO::fromArray($this->validated());
    }
}
