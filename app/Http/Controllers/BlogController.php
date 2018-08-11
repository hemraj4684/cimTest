<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth,Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
			$user_id = Auth::user()->id;
			$role_id = Auth::user()->role;
		}
		else{
			$user_id = null;
			$role_id = null;
		}	
		$posts = Blog::join('users','users.id', '=', 'blogs.author_id')
					->select('users.name', 'blogs.topic', 'blogs.post','blogs.author_id','blogs.id as blogId')
					->get();
		return view('blog.list',compact('posts','user_id','role_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$blogObj = new Blog();
		$data    = $request->all();
		//validates with conditions
		$validator =  $blogObj->checkInputValidation($data);
				
	    if ($validator->fails())
	    {
	        return redirect('blogs.create')->withErrors($validator);
	    }
	   	else{ 
			$result = $blogObj->saveRecord($data);
		
			if($result)
			  return Redirect::route('blogs.create')->with('success','Created'); 
			else
			  return Redirect::route('blogs.create')->with('fail','Failed');  		  
	  
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
        $post = Blog::find($id);
		return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Blog::find($id);
		return view('blog.edit', compact('post'));
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
        $blogObj = new Blog();
		$data    	= $request->all();
		//validates with conditions
		$validator =  $blogObj->checkInputValidation($data);
		
		if ($validator->fails())
	    {
	        return Redirect::route('blogs.edit',$id)->withErrors($validator);
	    }
	   	else{ 
			$result = $blogObj->saveRecord($data,$id);
		
		if($result)
	      return Redirect::route('blogs.edit',$id)->with('success','Created'); 
		else
	      return Redirect::route('blogs.edit',$id)->with('fail','Failed');  		  
	  
		}
		
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
