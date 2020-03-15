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

    protected function prepareForValidation()
    {
        $token = $this->get('_token');
        if($this->has('date_' . $token)) {
            $this->merge(['date' => $this->get('date_' . $token)]);
        }
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
            'client_id' => 'required',
            'counselor_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'client_id.required' => 'Please specify a client. If the client is unavailable, please <a href="' . route('clients.create') .'">add them</a>.',
            'counselor_id.required' => 'Please specify a counselor. If the counselor is unavailable, please <a href="' . route('counselors.create') .'">add them</a>.',
        ];
    }
}
