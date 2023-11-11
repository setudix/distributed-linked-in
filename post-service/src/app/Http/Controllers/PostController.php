<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
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

        $posts = Post::orderBy('created_at', 'desc')->get();

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

        if ($pictures != null) {

            foreach ($pictures as $picture) {
                $path = Storage::disk('minio')->put('photos', $picture);

                $photo = new Photo();
                $photo->post_id = $post->_id;
                $photo->path = $path;
                $photo->save();

            }
        }
        $author = Auth::user()->name;
        $usersToNotify = User::where('_id', '!=', auth()->id())->get();

        // dd($usersToNotify);
        foreach ($usersToNotify as $user) {
            $notification = new Notification();
            $notification->content = $author . ' has a new post';
            $notification->user_id = $user->_id;
            $notification->read_at = null;

            // dd($notification, $post);
            $notification->save();

        }
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
