<?php

namespace App\Http\Requests;

class ReserveRequest extends Request
{
    /** @var string  */
    protected $redirectRoute = 'reserve.form';

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
            'title' => 'required',
            'name' => 'required',
        ];
    }
}
