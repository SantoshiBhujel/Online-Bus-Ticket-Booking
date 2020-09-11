<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
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
            'regNo' => 'required | string',
            'vehicleType'=>'required | string',
            'engineNo'=>'required | string',
            'chassisNo'=>'required | string',
            'modelNo'=>'required | string',
            'ownerName'=>'required | string',
            'ownerNumber'=>'required | integer | digits:10 ' ,
            'brandName'=>'required| string',
            'status'=>'required | string'
        ];
    }
}
