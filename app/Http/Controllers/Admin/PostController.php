<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\PostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
   
    public function index(): View
    {
        $posts = Post::get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::get();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostRequest $request): RedirectResponse
    {
        if($request->validated()){
            $slug = Str::slug($request->title, '-');
            $banner = $request->file('banner')->store('assets/banner', 'public');
            Post::create($request->except('banner') + ['slug' => $slug, 'banner' => $banner]);
        }

        return redirect()->route('admin.posts.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Post $post): View
    {
        $categories = Category::get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        if($request->validated()){
            if($request->banner){
                File::delete('Storage/' . $post->banner);
                $slug = Str::slug($request->title, '-');
                $banner = $request->file('banner')->store('assets/banner', 'public');
                $post->update($request->except('banner') + ['slug' => $slug, 'banner' => $banner]);
            }else {
                $post->update($request->validated());
            }
        }

        return redirect()->route('admin.posts.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        File::delete('Storage/' . $post->banner);
        $post->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}