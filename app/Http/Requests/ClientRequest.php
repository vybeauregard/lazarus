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
            'dob_year'  => 'numeric',
            'dob_month'  => 'numeric',
            'dob_day'  => 'numeric',
            'zip'   =>  'numeric'
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

}
