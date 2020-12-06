<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_categories';


	public function rules()
	{
		return [
		'name' => 'required'
		];
	}

	public function messages()
	{
		return [
		'name.required' => 'Нэр хоосон байж болохгүй.'
		];
	}
}
