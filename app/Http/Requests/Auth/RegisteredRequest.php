<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisteredRequest extends FormRequest
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
            'over_name' => 'required|string|max:10',
            'under_name' => 'required|string|max:10',
            'over_name_kana' => 'required|string|regex:/^[ァ-ヴー]+$/u|max:30',
            'under_name_kana' => 'required|string|regex:/^[ァ-ヴー]+$/u|max:30',
            'mail_address' => 'required|email|unique:users|max:100',
            'sex' => 'required|numeric|max:3',
            'role' => 'required|numeric|max:4',
            'password' => 'required|alpha_num|min:8|max:30|confirmed',
            'birth_day' => 'required|date|after_or_equal:2000-01-01|before_or_equal:today',
        ];
    }

    protected function prepareForValidation(){
        $old_year = $this->old_year;
        $old_month = $this->old_month;
        $old_day = $this->old_day;
        $data = $old_year . '-' . $old_month . '-' . $old_day;
        $birth_day=date('Y-m-d', strtotime($data));
        $this->merge(['birth_day' => $birth_day]);
    }

    public function messages(){
        return [
            'required'            => ':attribute が未入力です',
            'string' => ':attribute は文字列である必要があります。',
            'max'                  => [
                'numeric' => ':attribute は :max 以下のみ有効です',
                'file'    => ':attribute は :max KB以下のファイルのみ有効です',
                'string'  => ':attribute は :max 文字以下のみ有効です',
                'array'   => ':attribute は :max 個以下のみ有効です',
            ],
            'regex'                => ':attribute はカナカナ入力です',
            'email'                => ':attribute はメール形式で入力してください',
            'unique'               => ':attribute は既に存在します',
            'numeric'              => ':attribute は数字のみ有効です',
            'alpha_num'            => ':attribute は「英字」「数字」のみ有効です',
            'confirmed'            => ':attribute を確認用と一致させてください',
            'date'                 => ':attribute を有効な日付形式にしてください',
            'after'                => ':attribute は :date より後の日付にしてください',
            'before'               => ':attribute は :date より前の日付にしてください',
        ];
    }

    public function attributes()
    {
        return [
            'over_name'=> '氏',
            'under_name'=> '名',
            'over_name_kana' => '氏（カナ）',
            'under_name_kana' => '名（カナ）',
            'birth_day' =>'誕生日',
            'mail_address' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }

}
