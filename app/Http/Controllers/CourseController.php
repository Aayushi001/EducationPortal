<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Storage;
use Auth;
use App\User;
use App\Role;
use App\Tutorial;
use App\Course;
use App\UploadedFile;
use Illuminate\Support\Facades\Session;
use DB;
class CourseController extends Controller


{
    public function open(){
    	
    	return view('course_display')
    	->with('categories', \App\Category::all())
    	->with('subcategories', \App\Subcategory::all())
    	->with('courses', \App\Course::all())
        ->with('tutorials', \App\Tutorial::all());
        
    }

    public function view($id){




        $selectedLevel = Input::has('Level') ? Input::get('Level') : null;

        

        if ($selectedLevel == 'beginner') {
        $tutorials = \App\Tutorial::where('level', '=', 'Beginner')->orderBy('id', 'DESC')->get();
        }

        elseif ($selectedLevel == 'intermediate') {
        $tutorials = \App\Tutorial::where('level', '=', 'Intermediate')->orderBy('id', 'DESC')->get();
        }

        else {
        $tutorials = \App\Tutorial::where('level', '=', 'Advanced')->orderBy('id', 'DESC')->get();
        }

       

    	return view('course_display')
        ->with('categories', \App\Category::all())
        ->with('subcategories', \App\Subcategory::all())
        ->with('courses', \App\Course::all())
    	->with('course', \App\Course::find($id))
        ->with('tutorials', $tutorials);




    }


    public function profile()
    {
        return view('profile');
    }

public function ajaxlevel(Request $request)
{
	
				$lev=$request->input("level");
	$count=Tutorial::where("level",$lev)->count();			
					if($count==0)
						return response()->view("sorttut",['count'=>$count]);
					
					else{
	$tuts=Tutorial::where("level",$lev)->get();
			 
					return response()->view("sorttut",["tuts"=>$tuts]);}
}
public function ajaxlanguage(Request $request)
{
	$lev=$request->input("language");
	$count=Tutorial::where("language",$lev)->count();			
					if($count==0)
						return response()->view("sorttut",['count'=>$count]);
					
					else{
	$tuts=Tutorial::where("language",$lev)->get();
			 
					return response()->view("sorttut",["tuts"=>$tuts]);}
				
}
public function ajaxprice(Request $request)
{
	$lev=$request->input("order");
	$count=DB::table("tutorials")->count();
	
	if($count==0)
		return response()->view("sorttut",['count'=>$count]);
	else{
	if($lev=="asc")
	{
		$tuts=Tutorial::orderBy("fee","asc")->get();
		
	}
	else $tuts=Tutorial::orderBy("fee","desc")->get(); 
	
			 
					return response()->view("sorttut",["tuts"=>$tuts]);}
				
}

public function ajaxalltut(Request $request)
{
	

	$count=DB::table("tutorials")->count();
	
	if($count==0)
		return response()->view("sorttut",['count'=>$count]);
	else{
	$tuts=Tutorial::all();
			 
					return response()->view("sorttut",["tuts"=>$tuts]);}
	
	
	
}

public function getAdmin()
{
	
	return view('admin_panel')
	->with('users', \App\User::all());
}

public function postAdminAssignRoles(Request $request)
{

        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if ($request['role_teacher']) {
            $user->roles()->attach(Role::where('name', 'Teacher')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return redirect()->back();
}

public function getTeacherPanel()
{
	return view('teacher_panel')
	->with('user', Auth::user())
    ->with('courses', \App\Course::all())
    ->with('tutorials', \App\Tutorial::all());
}

public function addTutorial(Request $request)
{

        $tut = new Tutorial;
        $tut->title = $request->input('name');
        $tut->description = $request->input('description');
        $tut->level = $request->input('level');
        $tut->language = $request->input('language');
        $courseName = Input::get('course');
        $course = Course::where('name', '=', $courseName)->first();
        $tut->course_id = $course->id;
        
        $user = Auth::user();
        $tut->teacher = $user->name;
        $tut->save();
        $request->session()->flash("message","TUTORIAL HAS BEEN SUCESSFULLY ADDED");
		return redirect()->back();

}

public function handleUpload($id, Request $request)
{
	return view('addCourse')
	->with('id', $id)
	->with('files', UploadedFile::all());
	if($request->hasFile('file'))
	{
		$user = Auth::user(); 
		$file = $request->file('file');
		$allowedFileTypes = config('app.allowedFileTypes');
		$maxFileSize = config('app.maxFileSize');
		$fileName = $file->getClientOriginalName();
		$rules = [
			'file' => 'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize 
			];
		$this->validate($request, $rules);
		$destinationPath = config('app.fileDestinationPath').'/'.$fileName;
		$uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

		if($uploaded)
		{
			$file = new UploadedFile;
			$file->file_name = $fileName;
			$file->user_id = $user->id;
			$file->tutorial->id = $id;
			$file->description = Input::get('description');
			$file->save();
			$request->session()->flash("message","YOUR FILE HAS BEEN UPLOADED SUCCESSFULLY");

		}
	}

	return redirect()->back();
}

}

