<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    //
    public function index()
    {
        // $userId = Auth::id();
        // $user = User::find($userId);
        $courses = Course::all();
        if (auth()->user()->hasRole('admin')) {
            return view('courses/index', [
                'courses' => $courses,
            ]);
        }else{
            return view('courses/indexx', [
                'courses' => $courses]);
        }
    }
    public function create(){
        $users = User::all();
        if (auth()->user()->hasRole('admin')) {
        return view('courses/create',['users'=>$users]);
        }else{
            echo "you are unautherized";
        }
    }

    function store(){
        $request=request();
        Course::create([
           
            'name'=>$request->name,
        ]);
        return redirect()->route('courses.index');
    }

    public function show()
    {
        $request = request();
        
        $courseId = $request->course;
        $course = Course::find($courseId);
        
        
                return view('courses/show', [
                    'course' => $course,
                ]);
            
    }

    public function edit()
    {
        $request = request();
       

        $courseId = $request->course;
        $course = Course::find($courseId);
        if (auth()->user()->hasRole('admin')) {
            return view('courses/edit', [
                'course' => $course,
               
            ]);
            }else{
                echo "you are unautherized";
            }
        
    }
    public function update()
    {   $request = request();
        $course = Course::find($request->id);
        $course->name = $request->name;
        
        $course->save();
      
            return redirect()->route('courses.index');
        
        
    }

    public function destroy(){
        $request = request();
       
        $courseId = $request->course;
        if (auth()->user()->hasRole('admin')) {
        
        Course::destroy($courseId);}else{
            echo "you are unautherized";
        }
      
        return redirect()->route('courses.index');

    }
    public function enroll(){
        $request = request();
        $courseId=$request->course;
        $course = Course::find($courseId);
        $userId = Auth::id();
        $user = User::find($userId);
        
     
        $cs=DB::table('course_user')->where('course_id',$courseId)->where('user_id',$userId)->first();
      
        if(!$cs){
            $user->courses()->attach($course);
        }
        
        
        return  view('courses/enroll', [
            'user' => $user,
            ]);
    }

    public function drop(){
        $request = request();
        $courseId=$request->course;
        $course = Course::find($courseId);
        $userId = Auth::id();
        $user = User::find($userId);
        
     
        DB::table('course_user')->where('course_id',$courseId)->where('user_id',$userId)->delete();
      
      
        
        
        return  view('courses/enroll', [
            'user' => $user,
            ]);
    }

}
