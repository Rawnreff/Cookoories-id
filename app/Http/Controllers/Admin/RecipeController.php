<?php

namespace App\Http\Controllers\Admin;

use App\Models\Recipe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\RecipeRequest;

class RecipeController extends Controller
{
   
    public function index(): View
    {
        $recipes = Recipe::get();

        return view('admin.recipes.index', compact('recipes'));
    }

    public function create(): View
    {
        return view('admin.recipes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'prep' => 'required|integer',
            'cook' => 'required|integer',
            'level' => 'required|string',
        ]);
    
        $data['slug'] = Str::slug($data['title']);
    
        Recipe::create($data);
    
        return redirect()->route('admin.recipes.index')->with('success', 'Recipe created successfully!');
    }
    

    public function edit(Recipe $recipe): View
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    public function update(RecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        if($request->validated()){
            $slug = Str::slug(data_get($request, 'title', 'default-title'), '-');
            $recipe->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.recipes.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}