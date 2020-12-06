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

use App\Ads;

class AdsController extends Controller
{
	public function __construct(Ads $ads)
	{
		$this->middleware('auth');
		$this->ads = $ads;
	}


	public function index(){
		$ads = Ads::paginate(20);
		return view('admin.ads.index')->with('ads',$ads);	
	}

	public function create(){
		return view('admin.ads.create');
	}

	public function store(Request $request){
		$ads = new Ads();
		$ads->link =  $request->input('link');
		$ads->name =  $request->input('name');
		$ads->type =  $request->input('type');

		$files = $request->file('images');
		if(count($files>0)){
			$rules = array('file' => 'required');
			$validator = Validator::make(array('file'=> $files[0]), $rules);
			if($validator->passes()){
				$destinationPath = public_path().'/uploads';
				$filename = '/uploads/'.Str::random(3).'.'.$files[0]->getClientOriginalExtension();
				$test = $files[0]->move($destinationPath, $filename);
				$ads->image= $filename;
				$ads->save();
			}
		}else{
			$ads->save();
		}



		return redirect('/dashboard/ads');
	}

	public function destroy(Request $request,$id){

		if(!$id){
			return redirect('/dashboard/ads');
		}
		$ads = Ads::find($id);

		if(!$ads){
			return redirect('/dashboard/ads');
		}
		$ads->delete();

		return redirect('/dashboard/ads');
	}
}
