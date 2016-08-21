<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Post;

use Input;

class DiscussionController extends Controller
{
    public function open(){
    	
    	return view('forum')
    	->with('forumCount', \App\Category::count())
        ->with('users', \App\User::all())
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
         if(Input::has('like_question'))
        {
            $question = Input::get('like_question');
           
            $like = new \App\QuestionLikes;
            $user = Auth::user();
            $like->user_id = $user->id;
            $like->question_id = $id; 

            $like->save();     
        }


        if(Input::has('comment_question'))
        {
            $question = Input::get('comment_question');
            $commentBox = Input::get('comment-text');

            $comment = new \App\QuestionComment;
            $comment->comment = $commentBox;
            $user = Auth::user();
            $comment->user_id = $user->id;
            $comment->question_id = $id; 

            $comment->save();

           
        }

         if(Input::has('answer_question'))
        {
            $question = Input::get('answer_question');
            $answerBox = Input::get('answer-text');

            $answer = new \App\Answer;
            $answer->answer = $answerBox;
            $user = Auth::user();
            $answer->user_id = $user->id;
            $answer->question_id = $id; 

            $answer->save();           
        }

        return view('question_display')
        ->with('question', \App\Post::find($id))
        ->with('users', \App\User::all())
        ->with('user', Auth::user())
        ->with('comments', \App\QuestionComment::all())
        ->with('answers', \App\Answer::all())
        ->with('likes', \App\QuestionLikes::all())
        ->with('check', \App\QuestionLikes::where(['question_id'=> $id , 'user_id' => Auth::user()->id])->first());
    }

}
