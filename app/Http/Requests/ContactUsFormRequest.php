<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsFormRequest extends FormRequest
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
          'contact_branch' => 'required',
          'contact_name' => 'required',
          'contact_email' => 'required',
          'contact_message' => 'required',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['contact_branch'] = filter_var( $input['contact_branch'], FILTER_SANITIZE_STRING );

        $input['contact_name'] = filter_var( $input['contact_name'], FILTER_SANITIZE_STRING );

        $input['contact_email'] = filter_var( $input['contact_email'], FILTER_SANITIZE_EMAIL );

        $input['contact_message'] = filter_var( $input['contact_message'], FILTER_SANITIZE_STRING );

        $this->replace( $input );
    }
}
