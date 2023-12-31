<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index() {
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $attributes = array_merge($this->validatePost(),[
            'user_id' => auth()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]);

        $post = Post::create($attributes);

        return redirect("/posts/{$post->slug}")->with('success','Post created by successfully');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);

        if($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'The post deleted successfully');
    }

    protected function validatePost(?Post $post =null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required|min:3',
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post)],
            'thumbnail' => $post->exists ? 'image ': 'required|image',
            'excerpt' => 'required|min:3',
            'body' => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'status' => $post->exists ? '' : 'required'
        ]);
    }
}
