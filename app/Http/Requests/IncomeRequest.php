<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
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
        $input = $this->except(['_token', '_method', 'submit']);
        $input['date'] = Carbon::createFromFormat("m/d/Y", $input['date']);
        $this->merge($input);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'name'  =>  'required',
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Please enter a name.'
        ];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
