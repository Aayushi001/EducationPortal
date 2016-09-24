<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;use App\User;
use App\Http\Requests;
use Input;
use App\Tutorial;
use App\UploadedFile;
use Illuminate\Support\Facades\Session;
use DB;
use Response;
use App\contact;
use App\Course;
use App\enrolcourse;
use App\Category;
use App\Subcategory;

class CourseController extends Controller


{
	
	
	public function redtowelcome(Request $request){
		
	
		$id=Auth::user()->id;
		$contact=new contact();
		$contact->telephone=$request->input("telephone");
		$contact->mobile=$request->input("mobile");
		$contact->user_id=$id;
		$contact->address=$request->input("address");
		
		$contact->save();
		return view("welcome");
		
		
		
	}
	
	
	public function ajaxsearch(Request $request)
	{
		
		$key=$request->input("key");
		if($key==""||$key==" ")
		{$count=0;
	return response()->json(["count"=>$count]);}
			
		else{
			
			$str="";
		$categories=Category::where("name","like","%".$key."%")->get();
		
		$cat=array();
		
		foreach($categories as $rr)
		{$cat[]=$rr->id;
		
		$url=route('home');
		$str.="<p style='color:red'><a href='".$url."'>".$rr->name."</a></p>";}
		
		
		$subcats=Subcategory::where("name","like","%".$key."%")->whereNotIn("category_id",$cat)->get();
		
		$subcat=array();
		
		foreach($subcats as $rr)
		{$subcat[]=$rr->id;
		
		
		$url=route('home');
		$str.="<p style='color:red'><a href='".$url."'>".$rr->name."</a></p>";}
		
		
		
		$courses=Course::where("name","like","%".$key."%")->whereNotIn("subcategory_id",$subcat)->get();
		
		$cours=array();
		
		foreach($courses as $rr)
		{$cours[]=$rr->id;
		
		
		$url=route('home');
		$str.="<p style='color:red'><a href='".$url."'>".$rr->name."</a></p>";}
		
		$tutorials=Tutorial::where("title","like","%".$key."%")->whereNotIn("course_id",$cours)->get();
		
		
	
		
		foreach($tutorials as $rr)
		{
		
		
		$url=route('home');
		$str.="<p style='color:red'><a href='".$url."'>".$rr->name."</a></p>";}
		
		
		
		return response()->json(['text'=>$str,"count"=>2]);
		
		}
		
		
		
	}
	
	public function home(){
		if(Auth::check())
		{$id=Auth::user()->id;
	
		if(contact::where("user_id",$id)->count()==0)
		return view("contacts");
	
	else return view("welcome");}
		
		else return view("welcome");
		
	}
	
	public function enrol($title,$teacher,$fee){
		return view('enrol',['teacher'=>$teacher,'title'=>$title,'fee'=>$fee])->with('categories', \App\Category::all())
    	->with('subcategories', \App\Subcategory::all())
    	->with('courses', \App\Course::all())
        ->with('tutorials', \App\Tutorial::all());
    ;
		
    
	}
	public function payment(Request $request,$user)
	{
		
		
	}
	
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
public function profilecourses(){
	
	$id=Auth::user()->id;
	$courses=enrolcourse::where("user_id",$id)->get();
	
	return view('profilecourses',['courses'=>$courses]);
}

    
	
	public function profile()
    {
		$id=Auth::user()->id;
		$contacts=contact::where("id",$id)->get();
		
		
        return view('profile',["contacts"=>$contacts]);
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
	->with('users', \App\User::all())
	->with('usersCount', \App\User::count());
}

public function add()
{
	return view('adminAdd')
	->with('subcategories', \App\Subcategory::all())
	->with('categories', \App\Category::all());
}

public function postAddCourse(Request $request)
{
	    $course = new Course;
        $course->name = $request->input('name');
       
        $subcatName = Input::get('subcategory');
        $subcat = Subcategory::where('name', '=', $subcatName)->first();
        $course->subcategory_id = $subcat->id;
    
        $course->save();
        $request->session()->flash("message","COURSE HAS BEEN SUCESSFULLY ADDED");
		return redirect()->back();
}

public function postAddSubcategory(Request $request)
{
	    $subcategory = new Subcategory;
        $subcategory->name = $request->input('name');
       
        $catName = Input::get('category');
        $cat = Category::where('name', '=', $catName)->first();
        $subcategory->category_id = $cat->id;
    
        $subcategory->save();
        $request->session()->flash("message","COURSE HAS BEEN SUCESSFULLY ADDED");
		return redirect()->back();
}

public function postAddCategory(Request $request)
{
	    $category = new Category;
        $category->name = $request->input('name');   
        $category->save();
        $request->session()->flash("message","COURSE HAS BEEN SUCESSFULLY ADDED");
			return redirect()->back();
}

public function getAdminAssignRoles()
{
	return view('admin_assignRoles')
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

public function getUploadPage($id)
{
	return view('addCourse')
	->with('id', $id)
	->with('files', UploadedFile::all());
}

public function handleUpload($id, Request $request)
{
	
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
			$file->tutorial_id = $id;
			$file->description = Input::get('description');
			$file->save();
			$request->session()->flash("message","YOUR FILE HAS BEEN UPLOADED SUCCESSFULLY");

		}
	}

	return redirect()->back();
}

public function handleUploadedFiles($name)
{
	
	$path = config('app.fileDestinationPath').'/'.$name;

	return Response::make(file_get_contents($path), 200, [
    'Content-Type' => 'application/pdf',
    'Content-Disposition' => 'inline; filename="'.$name.'"'
]);
}


}
