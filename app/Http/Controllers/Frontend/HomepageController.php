<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Post;

class HomepageController extends Controller
{
    public function index() {
        $latest_recipes = Recipe::with('galleries')->latest()->get();
        $recipes = Recipe::with('galleries')->get();
        $posts = Post::latest()->get();

        return view('frontend.homepage', compact('latest_recipes', 'recipes', 'posts'));
    }
}
