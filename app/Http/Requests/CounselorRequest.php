<?php

namespace App\Http\Requests;

use Facades\App\Counselor;
use Illuminate\Foundation\Http\FormRequest;

class CounselorRequest extends FormRequest
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
        Counselor::getPhonesCollection()->each(function($phone_field){
            if($this->has($phone_field)) {
                $this->merge([$phone_field => preg_replace("/[^0-9,.]/", "", $this->$phone_field )]);
            }
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'    => 'required|max:255',
            'last_name'    => 'required|max:255',
            'middle_initial'    => 'alpha|size:1|nullable',
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
            'zip.numeric'   => 'Zip code must be numeric',
            'dob_day.between'   => 'Birth day must be between :min and :max'
        ];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
