<?php

namespace App\Http\Requests;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name'=> 'required',
                'email'=> 'email|required|unique:users,email,' . $this->route("user"),
                'date_of entry' => 'required',
                'password'=>'required',
        ];
    }


}
