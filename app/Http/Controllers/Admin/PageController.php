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
use App\About;
use App\Term;
use App\AdsInfo;
use App\ContactInfo;

class PageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	public function getIndex(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		return view('admin.pages.index');
	}

	public function getAbout(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		return view('admin.pages.about');
	}

	public function getTerms(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		return view('admin.pages.terms');
	}

	public function getAds(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		return view('admin.pages.ads');
	}

	public function getContact(){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		return view('admin.pages.contact');
	}

	public function postAbout(Request $request){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		DB::table('abouts')->delete();

		$about = new About();
		$about->data =  $request->input('content');
		$about->save();

		return redirect('/dashboard/page/about');
	}

	public function postAds(Request $request){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		DB::table('ads_infos')->delete();

		$about = new AdsInfo();
		$about->data =  $request->input('content');
		$about->save();

		return redirect('/dashboard/page/ads');
	}

	public function postTerms(Request $request){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		DB::table('terms')->delete();

		$about = new Term();
		$about->data =  $request->input('content');
		$about->save();

		return redirect('/dashboard/page/terms');
	}

	public function postContact(Request $request){
		$auth_user = Auth::User();
		if($auth_user->user_type != 0){
			return redirect('/dashboard');
		}

		DB::table('contact_infos')->delete();

		$about = new ContactInfo();
		$about->location =  $request->input('location');
		$about->phonenumber =  $request->input('phonenumber');
		$about->email =  $request->input('email');
		$about->data =  $request->input('content');
		$about->save();

		return redirect('/dashboard/page/contact');
	}
}
