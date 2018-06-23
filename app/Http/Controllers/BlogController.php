<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\User;

use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $blogs = Blog::orderByRaw('created_at DESC')->paginate(6);
        return view('blogs.index', compact('blogs', $blogs, 'user', $user));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::id());
        if ($user->role == 1) {
            return view('blogs.create');
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog;

        //Move Uploaded Image to the uploads Folder
        $image = $request->file('blog_image');
        $input['blog_image'] = pathinfo($_FILES['blog_image']['name'], PATHINFO_FILENAME).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('assets/images/uploads');
        $image->move($destinationPath, $input['blog_image']);

        $blog->title = $request->blog_title;
        $blog->post = $request->blog_post;
        $blog->image = $input['blog_image'];
        $blog->user_id = $request->user_id;
        $blog->save();

        return redirect('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
           return view('blogs.show', compact('blog', $blog));
        }else{
            return redirect('/');
        }
        
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
