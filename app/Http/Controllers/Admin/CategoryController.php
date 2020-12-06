<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use File;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\PostCategory;

class CategoryController extends Controller
{
	public function __construct(PostCategory $postcategory)
	{
		$this->middleware('auth');
		$this->postcategory = $postcategory;
	}


	public function index(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		$cats = PostCategory::paginate(20);
		return view('admin.category.index')->with('cats',$cats);	
	}

	public function create(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		return view('admin.category.create');
	}

	public function store(Request $request){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		$validator = Validator::make([
			'name' => $request->input('name'),
			], $this->postcategory->rules(), $this->postcategory->messages());

		if($validator->fails()){
			return redirect('/dashboard/category/create')->with('errors',$validator->messages());
		}

		$cat = new PostCategory();
		$cat->name =  $request->input('name');
		$cat->save();

		return redirect('/dashboard/category');
	}

	public function edit($id){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		if(!$id){
			return redirect('/dashboard/category');
		}
		$category = PostCategory::find($id);

		if(!$category){
			return redirect('/dashboard/category');
		}
		return view('admin.category.edit')->with('category',$category);
	}

	public function update(Request $request,$id){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		$validator = Validator::make([
			'name' => $request->input('name'),
			], $this->postcategory->rules(), $this->postcategory->messages());

		if($validator->fails()){
			return redirect('/dashboard/category/create')->with('errors',$validator->messages());
		}

		$cat = PostCategory::find($id);
		$cat->name =  $request->input('name');
		$cat->save();

		return redirect('/dashboard/category');
	}

	public function destroy(Request $request,$id){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}
		
		if(!$id){
			return redirect('/dashboard/category');
		}
		$category = PostCategory::find($id);

		if(!$category){
			return redirect('/dashboard/category');
		}
		$category->delete();

		return redirect('/dashboard/category');
	}
}
