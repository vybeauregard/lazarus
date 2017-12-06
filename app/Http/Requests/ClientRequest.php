<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $rules = [
            'first_name'    => 'max:255',
            'last_name'    => 'max:255',
            'middle_initial'    => 'alpha|size:1',
            'address1'    => 'max:255',
            'address2'    => 'max:255',
            'city'    => 'max:255',
            'state'    => 'size:2',
            'apartment_name'    => 'max:255',
            'phone'    => 'max:14',
            'emergency_phone'    => 'max:14',
            'dob_year'  => 'numeric|between:1900,2017',
            'dob_month'  => 'numeric|between:1,12',
            'dob_day'  => 'numeric|between:1,31',
            'zip'   =>  'numeric|nullable'
        ];

        if ($this->has('date')) {
            $date = Carbon::parse($this->date)->toDateString();
            $this->merge(['date' => $date]);
        }
        if ($this->has('dob_year') && $this->has('dob_month') && $this->has('dob_day')) {
            $dob = "{$this->dob_year}-{$this->dob_month}-{$this->dob_day}";
            $this->merge(['dob' => $dob]);
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'zip.numeric'   => 'Zip code must be numeric',
            'dob_day.between'   => 'Birth day must be between :min and :max'
        ];
    }

}
