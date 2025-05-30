<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index(Request $request) {
        $recipes = Recipe::with('galleries');
        if($q = $request->query('search')) {
            $q = str_replace('-', ' ', Str::slug($q));

            $recipes = $recipes->whereRaw('MATCH(title, slug) AGAINST (? IN NATURAL LANGUAGE MODE)', [$q]);
        }
        $recipes = $recipes->get();

        return view('frontend.recipe.index', compact('recipes'));
    }

    public function show(Recipe $recipe) {
        return view('frontend.recipe.detail', compact('recipe'));
    }
}
