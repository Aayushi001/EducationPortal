<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', function () {
        return view('home');
    })->name("home")->middleware('auth');
    Route::get('/browse', array('as'=>'browse', 'uses'=> 'CourseController@open'));
    Route::auth();
    Route::get('/course/{id}', array('as'=>'course', 'uses'=>'CourseController@view'));
    Route::get('/profile', array('as'=>'profile', 'uses'=>'CourseController@profile'));
    Route::get('/discussion', array('as'=>'discussion', 'middleware' => 'auth', 'uses'=>'DiscussionController@open'));
    Route::get('/discussion-forum/ask-question', array('as'=>'ask-question', 'middleware' => 'auth', 'uses'=>'DiscussionController@ask'));
    Route::get('/discussion-forum/questions', array('as'=>'questions', 'middleware' => 'auth', 'uses'=>'DiscussionController@viewlist'));
    Route::any('/discussion-forum/question/{id}', array('as'=>'question.view', 'uses'=>'DiscussionController@viewquestion'));
Route::post("/discussion-forum/question/ajaxlike", array('as'=>'ajaxlike', 'uses'=>'DiscussionController@ajaxlike'));
Route::post("/discussion-forum/question/ajaxcomment", array('as'=>'ajaxcomment', 'uses'=>'DiscussionController@ajaxcomment'));
    Route::post('/discussion-forum/store', array('as'=>'store', 'uses'=>'DiscussionController@store'));
Route::post('/courses/level',array('as'=>'level', 'uses'=>'CourseController@ajaxlevel'));
Route::post("/courses/language",array('as'=>'language', 'uses'=>'CourseController@ajaxlanguage'));
Route::post("/courses/price",array('as'=>'price', 'uses'=>'CourseController@ajaxprice'));
Route::post("/courses/all",array('as'=>'alltut', 'uses'=>'CourseController@ajaxalltut'));



 Route::get('/admin', [
        'uses' => 'CourseController@getAdmin',
        'as' => 'admin',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

 Route::post('/admin/assign-roles', [
        'uses' => 'CourseController@postAdminAssignRoles',
        'as' => 'admin.assign',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

  Route::get('/teacher', [
        'uses' => 'CourseController@getTeacherPanel',
        'as' => 'teacher_panel',
        'middleware' => 'roles',
        'roles' => ['Teacher']
    ]);

  Route::post('/addTutorial', [
        'uses' => 'CourseController@addTutorial',
        'as' => 'addTutorial',
        'middleware' => 'roles',
        'roles' => ['Teacher', 'Admin']
    ]);


   Route::any('/handleUpload/{id}', [
        'uses' => 'CourseController@handleUpload',
        'as' => 'handleUpload',
        'middleware' => 'roles',
        'roles' => ['Teacher', 'Admin']
    ]);

    
});
