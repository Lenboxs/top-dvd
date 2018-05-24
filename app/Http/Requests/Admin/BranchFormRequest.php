<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BranchFormRequest extends FormRequest
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
          'name' => 'required',
          'email' => 'required',
          'contact_number' => 'required',
          'address' => 'required',

        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['name'] = filter_var( $input['name'], FILTER_SANITIZE_STRING );

        $input['email'] = filter_var( $input['email'], FILTER_SANITIZE_EMAIL );

        $input['contact_number'] = filter_var( $input['contact_number'], FILTER_SANITIZE_STRING );

        $input['address'] = filter_var( $input['address'], FILTER_SANITIZE_STRING );


        $this->replace( $input );
    }
}
