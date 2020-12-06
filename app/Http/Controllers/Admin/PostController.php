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

use App\Post;
use App\ImageOfPost;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PostController extends Controller
{
	public function __construct(Post $post)
	{
		$this->middleware('auth');
		$this->post = $post;
	}


	public function index()
	{
		$posts = Post::orderby('is_top','=','desc')->paginate(20);
		return view('admin.post.index')->with('posts',$posts);
	}

	public function create(){
		$tags = Post::existingTags()->pluck('name');
		return view('admin.post.create', compact('tags'));
	}

	public function store(Request $request){
		$files = $request->file('images');
		if( count($files) < 1){
			return redirect('/dashboard/post/create')->with('err','Зураг сонгогдоогүй байна');
		}

		$validator = Validator::make([
			'post_category' => $request->input('post_category'),
			'title' => $request->input('title'),
			'content' => $request->input('content'),
			], $this->post->rules(), $this->post->messages());

		if($validator->fails()){
			return redirect('/dashboard/post/create')->with('errors',$validator->messages());
		}

		$post = new Post();
		$post->title =  $request->input('title');
		$post->post_category =  $request->input('post_category');
		$post->content =  $request->input('content');
		if(!$request->input('little_content') || !$request->has('little_content')){
			$post->little_content = $request->input('post_title');
		}
		$post->user_id = Auth::User()->id;
		$post->save();

		if($request->tags){
			$post->tag(explode(',', $request->tags));
		}

		foreach($files as $file){
			$rules = array('file' => 'required');
			$validator = Validator::make(array('file'=> $file), $rules);
			if($validator->passes()){
				$destinationPath = public_path().'/uploads';
				$filename = '/uploads/'.Str::random(3).'.'.$file->getClientOriginalExtension();
				$test = $file->move($destinationPath, $filename);

				$image = new ImageOfPost;
				$image->path= $filename;
				$image->post_id = $post->id;
				$image->save();
			}
		}

		$process = new Process('python /var/local/oxbapp/kk/app/Http/profilepost.py');

		try {
			$process->mustRun();
			var_dump($process->getOutput());
		} catch (ProcessFailedException $e) {
			var_dump($e->getMessage());
		}


		return redirect('/dashboard/post');
	}


	public function destroy(Request $request,$id){
		$auth_user = Auth::User();

		if(!$id){
			return redirect('/dashboard/post');
		}
		$post = Post::find($id);

		if(!$post){
			return redirect('/dashboard/post');
		}

		if(($auth_user->user_type != 0) &&($post->user_id != $auth_user->id)){
			return redirect('dashboard/post');
		}

		foreach (ImageOfPost::where('post_id','=',$id)->get() as $data) {
			File::delete(public_path().$data->path);
		}

		$post->delete();

		return redirect('/dashboard/post');
	}

	public function getAddtop($id){
		if(!$id){
			return redirect('/dashboard/post');
		}
		$post = Post::find($id);

		if(!$post){
			return redirect('/dashboard/post');
		}

		$post->is_top = 1;
		$post->save();

		return redirect('/dashboard/post');
	}

	public function getDeltop($id){
		if(!$id){
			return redirect('/dashboard/post');
		}
		$post = Post::find($id);

		if(!$post){
			return redirect('/dashboard/post');
		}

		$post->is_top = 0;
		$post->save();

		return redirect('/dashboard/post');
	}


}
