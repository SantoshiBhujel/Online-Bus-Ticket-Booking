<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteRequest extends FormRequest
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
            'name'               => 'required | string',
            'startPoint'         => 'required | string',
            'endPoint'           => 'required | string',
            'stoppagePoints.*'   => 'nullable',
            'distanceTravelTime' => 'required | integer',
            'childrenSeat'       => 'required | string',
            'specialSeat'        => 'required | string',
            'status'             => 'required | string'
        ];
    }
}
