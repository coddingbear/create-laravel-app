<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
     * 유효성 검사 규칙을 정의한다.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
			'content' => ['required', 'min:10'],
        ];
    }
	
	/**
     * 사용자 정의 유효성 검사 오류 메세지를 정의한다.
     *
     * @return array
     */
	public function messages()
	{
		return [
			'required' => ':attribute은(는) 필수 입력 항목입니다.',
			'min' => ':attribute은(는) 최소 :min 글자 이상의 입력이 필요합니다.'
		];
	}
	
	/**
     * 오류 메세지에 표시할 필드 이름을 사용자 친화적 이름으로 정의한다.
     *
     * @return array
     */
	public function attributes() 
	{
		return [
			'title' => '제목',
			'content' => '본문',
		];
	}
}
