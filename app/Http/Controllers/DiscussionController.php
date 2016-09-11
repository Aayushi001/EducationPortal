<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\comment;
use App\reply;
use App\likes;
use Input;
use App\User;
use DB;
class DiscussionController extends Controller
{
	
	public function describe(){
		
		return view("tutdescription");
		
	}
    public function open(){
    	
    	return view('forum')
    	->with('forumCount', \App\Category::count())
    	->with('userCount', \App\User::count())
    	->with('categories', \App\Category::paginate(6))
        ->with('questions', \App\Post::all());
    	
    }

     public function ask(){

    	return view('ask')
    	->with('categories', \App\Category::all());
    }

     public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category = $request->input('category');

        $user = Auth::user();
        $post->user_id = $user->id;
        $post->save();
		$request->session()->flash("message","YOUR QUESTION HAS BEEN SUCESSFULLY POSTED");
		return redirect()->back();
    }

    public function viewlist()
    {
        return view('questions')
        ->with('questionCount', \App\Post::count())
        ->with('userCount', \App\User::count())
        ->with('questions', \App\Post::paginate(10))
        ->with('users', \App\User::all());
    }

    public function viewquestion($id)
    {
        
		 return view('question_display')
        ->with('question', \App\Post::find($id))
       
       
        ->with("comments",\App\comment::where("question_id",$id)->get())
		 ->with("commentcount",\App\comment::where("question_id",$id)->count())
       
        ->with('answers', \App\Answer::all())
        ->with('likecount', \App\likes::where('question_id',$id)->count());

		
}
public function ajaxlike(Request $request)
{
	$userid=\App\User::where("name",Auth::user()->name)->first()->id;

	$id=$request->input("id");
	$count=\App\likes::where(["question_id"=>$id,"user_id"=>$userid])->count();
	
	if($count>0)
	{
	\App\likes::where(["question_id"=>$id,"user_id"=>$userid])->delete();
		
		
	}
	else{
	$question=\App\Post::find($id);
	
	
$lik=new likes();
	
	$lik->user_id=$userid;

$lik->question_id=$question->id;

	$lik->save();}
	
	$count=\App\likes::where("question_id",$id)->count();
	
return response()->json(["count"=>$count]);
					
					}
		



public function ajaxcomment(Request $request)
{
	
	$userid=\App\User::where("name",Auth::user()->name)->first()->id;
	$id=$request->input('id');
	$comment=$request->input('comment');	
	
	$comm=new comment();
	$comm->comment=$comment;
	$comm->user_id=$userid;
	$comm->question_id=$id;
	
	$comm->save();
	$names=array();
	
	$name=Auth::user()->name;
	$t=\App\comment::where(['user_id'=>$userid,'question_id'=>$id])->orderBy("id",'desc')->first();
	$created=$t->created_at->diffForHumans();
	$r=$t->id;
$c=\App\comment::where("question_id",$id)->count();
	
	return response()->json(["count"=>$c,'created'=>$created,'id'=>$r,'comment'=>$request->input('comment'),'name'=>$name]);
	
	}
	public function ajaxreplies(Request $request)
	{
		
	
		$id=$request->input("id");
		$c=reply::where("question_comment_id",$id)->count();
		if($c==0)
			return response()->view("ajaxreplies",["count"=>0]);
		
		else {
			
			return response()->view("ajaxreplies",['replies'=>\App\reply::where('question_comment_id',$id)->get()]);
			
		}
		
		
	}
	public function ajaxsendreply(Request $request)
	{

			$reply=$request->input("reply");
			$id=$request->input("id");	$user=$request->input("user");$userid=Auth::user()->id;
			
			$ne=new reply();
			$ne->question_comment_id=$id;
			$ne->user=$user;
			$ne->user_id=$userid;
			$ne->reply=$reply;
			$ne->save();
			
			
		
		
		return response()->view("ajaxreplies",['replies'=>\App\reply::where('question_comment_id',$id)->get()]);
		
		
	}
	
	
	
}
