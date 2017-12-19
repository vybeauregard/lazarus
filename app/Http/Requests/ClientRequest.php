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

    private function sanitize()
    {
        if ($this->has('date')) {
            $date = Carbon::createFromFormat('m/d/Y', $this->date);
            $this->merge(['date' => $date]);
        }
        if ($this->has('dob_year') && $this->has('dob_month') && $this->has('dob_day')) {
            $dob = Carbon::createFromFormat('m/d/Y', "{$this->dob_month}/{$this->dob_day}/{$this->dob_year}");
            $this->merge(['dob' => $dob]);
        }
        $family_count = count(preg_grep("/family_name_/", array_keys($this->all())));
        $family = [];
        for($i=0;$i<$family_count;$i++){
            if($this['family_name_' . $i]) {
                $family[] = [
                    'relationship' => $this['family_relationship_' . $i],
                    'name' => $this['family_name_' . $i],
                    'dob' => Carbon::createFromFormat('m/d/Y', "{$this['family_dob_month_' . $i]}/{$this['family_dob_day_' . $i]}/{$this['family_dob_year_' . $i]}"),
                    'sex' => $this['family_sex_' . $i],
                    'birth_country' => $this['family_birth_country_' . $i],
                    'insurance' => $this['family_insurance_' . $i]
                ];
            }
        }
        $this->merge(['family' => $family]);

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
            'apartment_name'    => 'max:255',
            'phone'    => 'max:14',
            'emergency_phone'    => 'max:14',
            'dob_year'  => 'numeric|between:1900,2017',
            'dob_month'  => 'numeric|between:1,12',
            'dob_day'  => 'numeric|between:1,31',
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
