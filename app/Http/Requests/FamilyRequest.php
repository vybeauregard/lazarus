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
        if($this->name) {
            $family = [
                'relationship' => $this->relationship,
                'name' => $this->name,
                'dob' => Carbon::createFromFormat('m/d/Y', "{$this->dob_month}/{$this->dob_day}/{$this->dob_year}"),
                'sex' => $this->sex,
                'birth_country' => $this->birth_country,
                'insurance' => $this->insurance
            ];
            $this->merge(['family' => $family]);
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
            'name'  =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a name.'
        ];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
