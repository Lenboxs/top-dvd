<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MovieFormRequest extends FormRequest
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
          'active' => 'required',
          'new' => 'required',
          'name' => 'required',
          'slug' => 'required',
          'description' => 'required',
          'image' => 'required',
          'trailerlink' => 'required',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['name'] = filter_var( $input['name'], FILTER_SANITIZE_STRING );

        $input['slug'] = filter_var( $input['slug'], FILTER_SANITIZE_STRING );

        $input['description'] = filter_var( $input['description'], FILTER_SANITIZE_STRING );

        $input['image'] = filter_var( $input['image'], FILTER_SANITIZE_STRING );

        $input['trailerlink'] = filter_var( $input['trailerlink'], FILTER_SANITIZE_URL );

        $this->replace( $input );
    }
}
