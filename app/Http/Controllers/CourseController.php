<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;


class CourseController extends Controller
{
    //
    public function index()
    {
        // $userId = Auth::id();
        // $user = User::find($userId);
        $courses = Course::all();
        
            return view('courses/index', [
                'courses' => $courses,
            ]);
        
    }
    public function create(){
        $users = User::all();
       
        return view('courses/create',['users'=>$users]);
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
        
            return view('courses/edit', [
                'course' => $course,
               
            ]);
        
        
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
        // dd($orderId);
        Course::destroy($courseId);
      
        return redirect()->route('courses.index');

    }


}
