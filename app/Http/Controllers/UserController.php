<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        echo "<script type='text/javascript'>alert('Hello');</script>";

    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password = $request->pass;
        $user->save();
        return redirect()->back()->with('alert','Hello');
        //return $user;

    }
    public function Login(Request $request)
    {
        session_start();
        $email = $request->email;
        $pass = $request->pass;
        if($email=='aa@gmail.com' && $pass="123")
        {
           $users = User::All();
            session(['User'=>$email]);

           return view('Users',compact('users'));

        }
        $user = DB::select('select * from users where email = ? and password=?',[ $request->email,$request->pass]);
        if(count($user) == 1 )
         {
            echo "<script type='text/javascript'>alert('Login Successfull');</script>";
            session(['User'=>$user]);
            return view('AddBlog',compact('user'));

        }
        else
        {
            echo "<script type='text/javascript'>alert('Login Not Successfull');</script>";
        }
        //    print_r($user);
        //new User();
        /*$user->where([
                ['email','=',$rquest->email],
                ['Password','='.$request->pass]
        ]);*/
    //    $method = $request->method();
        //    return $method;
        //return view('welcome');
    }
}
