<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        // $userId = Auth::id();
        // $user = User::find($userId);
        $users = User::all();
        
            return view('users/index', [
                'users' => $users,
            ]);
        
    }
    public function create(){
        $courses = Course::all();
       
        return view('users/create',['courses'=>$courses]);
    }

    function store(){
        $request=request();
        User::create([
           
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,

        ]);
        return redirect()->route('users.index');
    }

    public function show()
    {
        $request = request();
        
        $userId = $request->user;
        $user = User::find($userId);
       
        
                return view('users/show', [
                    'user' => $user,
                ]);
            
    }

    public function edit()
    {
        $request = request();
       

        $userId = $request->user;
        $user = User::find($userId);
        
            return view('users/edit', [
                'user' => $user,
               
            ]);
        
        
    }
    public function update()
    {   $request = request();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        
        $user->save();
      
            return redirect()->route('users.index');
        
        
    }

    public function destroy(){
        $request = request();
       
        $userId = $request->user;
        // dd($orderId);
        User::destroy($userId);
      
        return redirect()->route('users.index');

    }
}
