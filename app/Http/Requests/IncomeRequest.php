<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Facades\App\Income;
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

    protected function prepareForValidation()
    {
        $input = $this->except(['_token', '_method', 'submit']);
        $input['date'] = Carbon::createFromFormat("m/d/Y", $input['date_' . $this->get('_token')]);

        Income::getCheckboxesCollection()->each(function($checkbox_field){
            if(!$this->has($checkbox_field)) {
                $this->merge([$checkbox_field => 0]);
            }
        });

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
            'apartment_name'    => 'max:255',
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Please enter a name.'
        ];
    }

}
