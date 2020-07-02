<?php

namespace App\Http\Controllers;
use App\Blogs;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = session('User');
        $usr = $usr[0]->id;
        echo $usr;
        //print_r($usr);

        return session('User');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request))
        {
            $Blog  = new Blogs();
            $bimg = $request->file('file');

            //SESSION CAPPING            
            $user = session('User');  //$_SESSION['User']['id'];
            $userid = $user[0]->id;
            $user = User::findOrFail($userid);
            
            //FILE UPLOAD
            $path = public_path().'/BlogImg/'.$request->title.'_'.$userid;
            if(!File::isDirectory($path)){
                 File::makeDirectory($path, 0777, true, true);
            }
            $bimg->move($path,$bimg->getClientOriginalName());

            //SAVE BLOG DETAILS
            $Blog->title = $request->title;
            $Blog->content = $request->blogContent;
            $Blog->image = $bimg->getClientOriginalName();
            //$Blog->user_id = $userid;
            $user->addBlog()->save($Blog);
            
            return response()->json(array('msg'=>'Hey,True '.$userid.'--'.$Blog),200);
        }
        else
        {
            return response()->json(array('msg'=>'Please Fill up all Details '.$request->title),200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
