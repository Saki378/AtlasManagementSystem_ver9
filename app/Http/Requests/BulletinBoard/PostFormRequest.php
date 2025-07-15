<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    // 名前付きエラーバック作成
    protected $errorBag = 'post';

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
            'post_category_id' => 'required|exists:sub_categories,id',
            'post_title' => 'required|string|max:100',
            'post_body' => 'required|string|max:2000',
        ];
    }

    public function messages(){
        return [
            'post_category_id.exists' => 'サブカテゴリーは登録されていません。',
            'required' => ':attribute は必ず入力してください。',
            'string' => ':attribute は文字列である必要があります。',
            'post_title.max' => 'タイトルは100文字以内で入力してください。',
            'post_body.max' => '内容は2000文字以内で入力してください。',
        ];
    }

    public function attributes()
    {
        return [
        'post_category_id'=> 'カテゴリー',
        'post_title'=> 'タイトル',
        'post_body'=> '内容',
        ];
    }

}
