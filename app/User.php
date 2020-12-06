<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function rules()
    {
        return [
        'name' => 'required',
        'email' => 'required|unique:users|email',
        'password' => 'required|confirmed|min:6|max:32',
        'password_confirmation' => 'required|min:6|max:32'
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Нэр хоосон байж болохгүй.',
        'email.required' => 'Имэйл хоосон байж болохгүй.',
        'password.required' => 'Нууц үг хоосон байж болохгүй.',
        'email.unique' => 'Таны оруулсан и-мэйл бүртгэлтэй байна.',
        'email.email' => 'И-мэйл-ийн формат буруу байна etc: yourmail@site.org.',
        'password.confirmed' => 'Нууц үгээ зөв давтана уу.',
        'password.min' => 'Нууц үг хамгийн багадаа 6 урттай байна.',
        'password_confirmation.required' => 'Нууц үгээ давтана уу.'
        ];
    }
}
