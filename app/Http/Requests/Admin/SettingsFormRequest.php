<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingsFormRequest extends FormRequest
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

          'logo' => 'required',
          'heading' => 'required',

        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['logo'] = filter_var( $input['logo'], FILTER_SANITIZE_STRING );
        $input['heading'] = filter_var( $input['heading'], FILTER_SANITIZE_STRING );

        $this->replace( $input );
    }
}
