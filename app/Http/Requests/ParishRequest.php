<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParishRequest extends FormRequest
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

    private function sanitize()
    {
        if ($this->has('phone')) {
            $this->merge(["phone" => preg_replace("/[^0-9,.]/", "", $this->phone )]);
        }
        if ($this->has('emergency_phone')) {
            $this->merge(["emergency_phone" => preg_replace("/[^0-9,.]/", "", $this->emergency_phone )]);
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required',
            'address1'    => 'max:255',
            'address2'    => 'max:255',
            'city'    => 'max:255',
            'state'    => 'size:2',
            'phone'    => 'max:14',
            'emergency_phone'    => 'max:14',
            'zip'   =>  'numeric|nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Parish must have a name.',
            'zip.numeric'   => 'Zip code must be numeric.',
        ];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
