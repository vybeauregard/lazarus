<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
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
        $this->merge([
            'date' => Carbon::createFromFormat('m/d/Y', $this->date)
        ]);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Please specify a client. If the Client is unavailable, please <a href="' . route('clients.create') .'">create them</a>.',
        ];
    }

    public function getValidatorInstance() {
        $this->sanitize();
        return parent::getValidatorInstance();
    }

}
