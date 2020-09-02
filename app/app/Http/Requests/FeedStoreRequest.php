<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedStoreRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'required|url|unique:feeds,url,'.$this->id.',id,user_id,'.$this->user()->id,
        ];
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'url.url' => 'The source url format is invalid',
        'url.unique' => 'The source url already exists',
    ];
}
}