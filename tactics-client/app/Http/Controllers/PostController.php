<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    // public function like($id)
    // {
    //     $post = Post::findOrFail($id);
    //     $post->likes++;
    //     $post->save();

    //     return back();
    // }

    public function like(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        if (!session()->has('liked_post_' . $post->id)) {
            $post->likes++;
            $post->save();
            session(['liked_post_' . $post->id => true]);
            return redirect()->back()->with('success', 'Post liked!');
        } else {
            return redirect()->back()->with('error', 'You have already liked this post!');
        }
    }

    public function unlike(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        if (session()->has('liked_post_' . $post->id)) {
            $post->likes--;
            $post->save();
            session()->forget('liked_post_' . $post->id);
            return redirect()->back()->with('success', 'Post unliked!');
        } else {
            return redirect()->back()->with('error', 'You have not liked this post!');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->name = $request->user()->name;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $imagePath = $image->store('images', 'public');

                    $postImage = new Image();
                    $postImage->image_path = $imagePath;
                    $postImage->save();

                    $post->images()->attach($postImage);
                }
            }
        }

        return redirect('/posts')->with('success', 'Post created successfully!');
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts = Post::all();

        return view('post', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit-post', compact('post'));
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
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        // Update other post properties as needed
        $post->save();

        return redirect()->route('forum')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/forum')->with('success', 'Post deleted successfully!');
    }
}