<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Facades\App\Program;
use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
        Program::getDatesCollection()->each(function($date){
            if ($this->has($date) && $this->$date != "") {
                $this->merge([$date => Carbon::createFromFormat('m/d/Y', $this->$date)]);
            }
        });

        Program::getCheckboxesCollection()->each(function($checkbox){
            if(!$this->has($checkbox)) {
                $this->merge([$checkbox => 0]);
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
            'client_id'    => 'required',
            'name'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Please specify a client. If the client is unavailable, please <a href="' . route('clients.create') .'">add them</a>.',
        ];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
