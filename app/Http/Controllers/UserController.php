<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $posts = Post::where('user_id', Auth::id())->get(); 
    return view('dashboard', compact('posts'));
}

public function index1()
{
    $posts = Post::all(); // Fetch all posts
    return view('welcome', compact('posts'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   

public function store(Request $request)
{
    $post = new Post;
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->user_id = Auth::id(); 

    // Handle file upload
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('uploads/post/'), $filename); // Ensure path is accessible
        $post->image = $filename;
    }

    $post->save();

    return redirect()->route('dashboard')->with('message', 'Post created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::find($id);
        if(!$post){
            return redirect()->route('dashboard')->with('error','post not found');
        }
        return view('user.view',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        return view('user.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);  

    $post->title = $request->input('title');  // Change 'name' to 'title'
    $post->content = $request->input('content');  // Change 'email' to 'content'

    // Handle file upload
    if ($request->hasFile('image')) {
        $detination='uploads/post/'.$post->image;
        if(File::exists('image'))
        {
            File::delete($detination);
        }
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/post/', $filename);
        $post->image = $filename;
    }

    $post->update();

    return redirect()->route('dashboard')->with('message', 'Post update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard')->with('message','User is deleted');
    }

    //Handle Search Bar
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Post::where('title', 'like', "%$search%")->get();
    
        return view('welcome', [
            'results' => $results,
            'posts' => Post::all()
        ]);
    }

    //All user can view post at home page 
    public function show1(string $id)
    {
        $post=Post::find($id);
        if(!$post){
            return redirect()->route('home')->with('error','post not found');
        }
        return view('user.show',['post'=>$post]);
    }

}
