<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use Carbon\Carbon;
use App\PostCategory;
use App\MyTag;
use App\User;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->take(12)->get();
        $random_posts = Post::where('is_top','=',1)->orderBy('updated_at', 'desc')->take(3)->get();
        if(count($random_posts)<1){
             $random_posts = Post::orderByRaw("RAND()")->take(3)->get();
        }
        return view('blog.index', compact('posts'), compact('random_posts'));
    }

    public function showPost($slug){
        $post = Post::whereSlug($slug)->first();
        if(!$post){
            return redirect('/');
        }
        return view('blog.post')->withPost($post);
    }

    public function categoryGrid(Request $request){
        $title = "Бүгд";
        $posts = Post::paginate(30);
        $id = 0;
        if($request->has('category')){
            $category = PostCategory::find($request->input('category'));
            if(!$category){
                return redirect('/blog');
            }
            $id = $category->id;
            $title = $category->name;
            $posts = Post::where('post_category','=',$category->id)->paginate(30);
        }

        if($request->has('tag')){
            $tag = MyTag::where('tag_slug','=',$request->input('tag'))->first();
             if(!$tag){
                return redirect('/blog');
            }
            $title = "#".$tag->tag_name;
            $posts = Post::withAnyTag($tag->tag_name)->paginate(30);
        }

        if($request->has('user')){
            $user = User::where('id','=',$request->input('user'))->first();
             if(!$user){
                return redirect('/blog');
            }
            $title = $user->name."-н оруулсан постууд";
            $posts = Post::where('user_id','=',$user->id)->paginate(30);
        }

        return view('blog.grid')->with('title',$title)->with('posts',$posts)->with('id',$id);
    }
}