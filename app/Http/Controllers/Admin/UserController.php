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
use Auth;
use App\User;

class UserController extends Controller
{
	public function __construct(User $user)
	{
		$this->middleware('auth');
		$this->user = $user;
	}


	public function index(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		$users = User::all();
		return view('admin.user.index')->with('users',$users);	
	}

	public function create(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}
		
		return view('admin.user.create');
	}

	public function store(Request $request){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		$validator = Validator::make([
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => $request->input('password'),
			'password_confirmation' => $request->input('password_confirmation')
			], $this->user->rules(), $this->user->messages());

		if($validator->fails()){
			return redirect('/dashboard/user/create')->with('errors',$validator->messages());
		}

		$user = new User();
		$user->name =  $request->input('name');
		$user->email =  $request->input('email');
		$password = Hash::make($request->input('password'));
		$user->password =  $password;
		$user->user_type =  $request->input('user_type');
		$user->save();

		return redirect('/dashboard/user');
	}

	public function destroy(Request $request,$id){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}
		
		if(!$id){
			return redirect('/dashboard/user');
		}
		$user = User::find($id);

		if(!$user){
			return redirect('/dashboard/user');
		}
		$user->delete();

		return redirect('/dashboard/user');
	}
}
