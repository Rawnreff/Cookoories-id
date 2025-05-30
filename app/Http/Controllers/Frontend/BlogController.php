<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class BlogController extends Controller
{
    public function index() {
        $posts = Post::get();
        $categories = Category::get();

        return view('frontend.blog.index', compact('posts', 'categories'));
    }

    public function show(Post $post) {
        $categories = Category::get();

        return view('frontend.blog.detail', compact('post', 'categories'));
    }

    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)->get();
        $categories = Category::get();

        return view('frontend.blog.index', compact('posts', 'categories', 'category'));
    }

    public function showCategory($slug)
    {
        $categories = Category::all();
        $currentCategory = Category::where('slug', $slug)->first();
        if (!$currentCategory) {
            return redirect()->route('blog');
        }
        $posts = Post::where('category_id', $currentCategory->id)->get();
        return view('frontend.blog.index', compact('categories', 'currentCategory', 'posts'));
    }
}
