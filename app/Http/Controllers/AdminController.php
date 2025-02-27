<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $posts = Post::all(); 
        return view('admin.dashboard', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'usertype' => 'required|string|in:user,admin',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create new user
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'usertype' => $request->usertype,
        'password' => Hash::make($request->password),
    ]);
    return redirect()->route('admin.dashboard')->with('message', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);
        return view('admin.view',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('admin.edit-user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);  

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
        ]);
       
    
        $user->update();
    
        return redirect()->route('dashboard')->with('message', 'User Updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $type, string $id)
{
    if ($type === 'user') {
        // Delete the user
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.dashboard')->with('message', 'User is deleted');
    } elseif ($type === 'post') {
        // Delete the post
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.postmanage')->with('message', 'Post is deleted');
    }

    // If the type is neither user nor post
    return redirect()->route('admin.dashboard')->with('message', 'Invalid resource type');
}

    public function managepost(){
        $posts = Post::all(); 
        return view('admin.dashboard', compact('posts'));
    }

    
}
