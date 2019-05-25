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
                'sex' => $this->sex,
                'birth_country' => $this->birth_country,
                'insurance' => $this->insurance
            ];
            if($this->formatDOB()) {
                $family['dob'] = $this->formatDOB();
            }

            $this->merge(['family' => $family]);
        }

    }

    private function formatDOB()
    {
        if(!$this->has('dob_month') || !$this->has('dob_day') || !$this->has('dob_year')) {
            return false;
        }
        return Carbon::createFromFormat('m/d/Y', "{$this->dob_month}/{$this->dob_day}/{$this->dob_year}");
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
