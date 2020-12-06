<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use File;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Post;
use App\Tag;

class TagController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index(){
		$tags = Tag::all();
		return view('admin.tag.index', compact('tags'));
	}
}
