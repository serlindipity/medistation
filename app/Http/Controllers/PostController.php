<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\Media;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('post.manage');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function followers(): Application|Factory|View
    {
        return view('post.followers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $users = User::all();
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return void
     */
    public function store(CreatePostRequest $request): void
    {
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return void
     */
    public function show(Post $post): void
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return Application|Factory|View
     */

     // responsible for displaying the edit form for a specific post.
    public function edit(Post $post): View|Factory|Application
    {
        return view('post.edit', ['post' => $post]); // Returns the "post.edit" view, passing the $post variable to the view.
    }

    // responsible for retrieving a specific post and its associated data.
    public function getPost($id)
    {
        $post = Post::where('id', $id)->with(['postImages'])->get()->first(); // Retrieves the post with the given $id from the database.
        $users = User::all(); // Retrieves all users from the database.
        return view('post.edit', ['post' => $post, 'users' => $users]); // Returns the "post.edit" view, passing the $post and $users variables to the view.
    }

    // responsible for deleting a specific image associated with a post.
    public function deleteImage($id)
    {
        $post = Media::where('id', $id)->delete(); // Deletes the media record with the given $id from the Media table.
        return back(); // Redirects the user back to the previous page.
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     *
     * @return void
     */

    // responsible for updating a post based on the provided request data.
    public function update(Request $request)
    {

        $post = Post::find($request->id); // Finds the post with the given ID.

        // Update the fields
        $post->title = $request->title;
        $post->body = $request->body;
        $post->location = $request->location;

        // Save the changes
        $post->save(); // Saves the changes made to the post.

        // Creates tag records for the post based on the tags provided in the request.
        if(count($request->tags) !== 0){
            foreach($request->tags as $tag){
                Tag::create([
                    'post_id' => $post->id,
                    'uid' => $tag,
                ]);
            }
        }

        // Stores the uploaded file in the "public/storage" disk under the "post-photos" directory.
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('post-photos', 'public');

            $isImage = preg_match('/^.*\.(png|jpg|gif)$/i', $path); // Checks if the file has a valid image extension.

            // Creates a media record for the post, associating the uploaded file with the post.
            Media::create([
                'post_id' => $post->id,
                'uid' => '/public/storage/'.$path,
                'is_image' => $isImage,
            ]);
        }

        return redirect('/post/edit/'.$request->id); // Redirects the user to the edit page of the updated post.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return void
     */
    public function destroy(Post $post): void
    {
    }
}
