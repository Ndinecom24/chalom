<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanApplicationRequest extends FormRequest
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
        return [
            'mobile_number' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'gender' => 'required',
            'plot_street' => 'required',
            'country' => 'required',
            'city' => 'required',
            'work_status_id' => 'required',
            'marital_status' => 'required',
            'district' => 'required',
            'kin_name' => 'required',
            'kin_phone' => 'required',
            'kin_relationship' => 'required',
            'kin_work' => 'required',
        ];
    }
}
