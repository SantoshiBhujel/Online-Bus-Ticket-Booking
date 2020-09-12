<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name' => 'required | string ',
            'startDate' => 'required | date | after:yesterday',
            'endDate' => 'required | after:startDate',
            'offerCode' => 'required | string',
            'discount' => 'required ',
            'terms' => 'required | string',
            'routes_id' => 'required | integer', 
            'offerNumber' => 'required | integer',
        ];
    }
}
