<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameStoreRequest extends FormRequest
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
     * @var mixed
     */
    public $white;
    /**
     * @var mixed
     */
    public $black;
    /**
     * @var mixed
     */
    public $winner;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
        'white' =>'different:field|nullable',
        'black' =>'different:field|nullable',

        ];
    }

}
