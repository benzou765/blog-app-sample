<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminBlogRequest extends FormRequest
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
            'post_date' => 'required|date',
            'recommended' => 'required|integer|between:1,5',
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:10000'
        ];
    }

    /**
     * Each setting of validation message.
     * Format:
     * [
     *    <field>.<rule> => <message>
     * ]
     */
    public function messages()
    {
        return [
            'post_date.required' => '日付は必須です',
            'post_date.date' => '日付は必須です',
            'recommended.integer' => 'オススメ度は数字を入力してください',
            'recommended.between' => 'オススメ度は:min-:maxの範囲で入力してください',
            'title.required' => 'タイトルは必須です',
            'title.string' => 'タイトルは文字列を入力してください',
            'title.max' => 'タイトルは:max文字以内で入力してください',
            'body.required' => '本文は必須です',
            'body.string' => '本文は文字列を入力してください',
            'body.max' => '本文は:max文字以内で入力してください',
        ];
    }
}