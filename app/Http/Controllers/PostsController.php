<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validation
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048'
        ]);

        if($request->file('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
   
            // File upload location
            $location = 'uploads';
   
            // Upload file
            $file->move($location,$filename);
        }

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'image' => $filename,
            'vehicles' => json_encode(request('vehicles')),
            'gender' => request('gender'),
            'country' => request('country'),
        ]);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        // Validation
        request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        if(request('image')) {
            $file = request('image');
            $filename = time().'_'.$file->getClientOriginalName();
   
            // File upload location
            $location = 'uploads';
   
            // Upload file
            $file->move($location,$filename);

            // Delete existing file
            $imagePath = public_path('uploads/'.request('old_image'));
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
        } else {
            $filename = request('old_image');
        }

        // update
        $post->update([
            'title' => request('title'),
            'content' => request('content'),
            'image' => $filename,
            'vehicles' => json_encode(request('vehicles')),
            'gender' => request('gender'),
            'country' => request('country'),
        ]);

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect('/posts');
    }
}
