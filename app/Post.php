<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use App\Tag;

class Post extends Model
{

	use Taggable;

	public function rules()
	{
		return [
		'title' => 'required',
		'content' => 'required'
		];
	}

	public function messages()
	{
		return [
		'title.required' => 'Гарчиг хоосон байж болохгүй.',
		'content.required' => 'Дэлгэрэнгүй хоосон байж болохгүй.'
		];
	}


	public function setTitleAttribute($value)
	{
		$this->attributes['title'] = $value;

		if (! $this->exists) {
			$this->attributes['slug'] = str_slug($value);
		}
	}

	protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title.'-'.$extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($title, $extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }
}
