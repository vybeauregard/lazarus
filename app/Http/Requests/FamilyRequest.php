<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class FamilyRequest extends FormRequest
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
        if($this['family_name_0']) {
            $family = [
                'relationship' => $this['family_relationship_0'],
                'name' => $this['family_name_0'],
                'dob' => Carbon::createFromFormat('m/d/Y', "{$this['family_dob_month_0']}/{$this['family_dob_day_0']}/{$this['family_dob_year_0']}"),
                'sex' => $this['family_sex_0'],
                'birth_country' => $this['family_birth_country_0'],
                'insurance' => $this['family_insurance_0']
            ];
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
        return [];
    }

    public function messages()
    {
        return [];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
