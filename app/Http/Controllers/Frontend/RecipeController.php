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
            $recipes = $recipes->where(function($query) use ($q) {
                $query->whereRaw('MATCH(title, slug) AGAINST (? IN BOOLEAN MODE)', ["*$q*"])
                      ->orWhere('title', 'like', "%$q%")
                      ->orWhere('slug', 'like', "%$q%");
            });
            
        }
        
        $recipes = $recipes->get();

        return view('frontend.recipe.index', compact('recipes'));
    }

    public function show(Recipe $recipe) {
        return view('frontend.recipe.detail', compact('recipe'));
    }
    

    public function suggest(Request $request) {
        $query = $request->input('q');
        
        if(strlen($query) < 2) {
            return response()->json([]);
        }
        
        $recipes = Recipe::where('title', 'like', "$query%")
                       ->limit(5)
                       ->get(['id', 'title']);
                       
        return response()->json($recipes);
    }
}