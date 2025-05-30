<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function index()
    {
        return response()->json(Recipe::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'prep' => 'required|integer',
            'cook' => 'required|integer',
            'level' => 'required|string|max:50',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        $recipe = Recipe::create($validated);

        return response()->json($recipe, 201);
    }

    public function show(Recipe $recipe)
    {
        return response()->json($recipe);
    }

    public function update(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'prep' => 'sometimes|required|integer',
            'cook' => 'sometimes|required|integer',
            'level' => 'sometimes|required|string|max:50',
        ]);

        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $recipe->update($validated);

        return response()->json($recipe);
    }

    public function destroy(Recipe $recipe)
    {
        $recipe->delete();

        return response()->json(['message' => 'Recipe deleted.']);
    }
}
