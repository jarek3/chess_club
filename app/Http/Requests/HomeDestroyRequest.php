<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeDestroyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
       return !($this->route('home') == config('cms.default_user_id') || $this->route('home') == auth()->user()->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
