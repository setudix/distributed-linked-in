<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        // dd($user->_id, $user->id);
        $posts = Post::orderBy('created_at', 'desc')->get();
        // // $post = Post::find('654bc39ae1a6bdaa4e02e3a9');
        // // dd($post->photos);

        // foreach($posts as $post){
        //     if($post->_id == '654bc39ae1a6bdaa4e02e3a9') {
        //         dd($post->photos);
        //     }
        // }
        return view('dashboard', ['posts' => $posts,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('images'));
        $request->validate([
            'content' => 'string|nullable',
            'images.*' => 'file|image|nullable',
        ]);

        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = Auth()->user()->_id;
        $post->save();


        $pictures = $request->file('images');

        
        foreach ($pictures as $picture)
        {
            $path = Storage::disk('minio')->put('photos', $picture);

            $photo = new Photo();
            $photo->post_id = $post->_id;
            $photo->path = $path;
            $photo->save();

        }

        // $usersToNotify = User::where('id', '!=', auth()->id())->get();
        // foreach ($usersToNotify as $user) 
        // {
        //     $user->notify(new NewPostNotification($post));
        // }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
