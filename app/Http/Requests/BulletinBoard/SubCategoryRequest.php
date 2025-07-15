<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
        protected $errorBag = 'subcategory';

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(){
        return [
        'main_category_id' => 'required|exists:main_categories,id',
        'sub_category_name' => 'required|max:100|string|unique:sub_categories,sub_category',
        ];
    }

    public function messages(){
        return [
        'main_category_id.exists' => 'メインカテゴリーは登録されていません。',
        'required' => ':attribute は必ず入力してください。',
        'sub_category_name.string' => 'サブカテゴリーは文字列である必要があります。',
        'sub_category_name.max' => '最大文字数は100文字です。',
        'sub_category_name.unique' => 'サブカテゴリーは既に存在します。',
        ];
    }

    public function attributes()
    {
        return [
        'main_category_id'=> 'メインカテゴリー',
        'sub_category_name'=> 'サブカテゴリー',
        ];
    }
}
