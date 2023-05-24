<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardExpirationMonth;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardNumber;

class PaymentPayRequest extends FormRequest {

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
            'card' => ['required', new CardNumber()],
            'year' => ['required', new CardExpirationYear($this->get('month'))],
            'month' => ['required', new CardExpirationMonth($this->get('year'))],
            'cvv' => ['required', new CardCvc($this->get('card'))],
            'owner' => 'required|string|min:5',
        ];
    }

}
