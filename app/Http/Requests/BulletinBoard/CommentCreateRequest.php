<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\ValidatationException;

class CommentCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comment' => 'required|string|max:250',
        ];
    }

    public function messages(){
        return [
        'comment.required' =>'コメント内容は必ず入力してください',
        'comment.string' =>'コメント内容は文字列である必要があります。',
        'comment.max' =>'コメント内容は2000文字です。',
        ];
    }


}
