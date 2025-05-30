<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\IngredientRequest;

class IngredientController extends Controller
{

    public function store(IngredientRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->ingredients()->create($request->validated());

        return redirect()->route('admin.recipes.edit', $recipe->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Recipe $recipe, Ingredient $ingredient): View
    {
        return view('admin.ingredients.edit', compact('ingredient', 'recipe'));
    }

    public function update(IngredientRequest $request, Recipe $recipe, Ingredient $ingredient): RedirectResponse
    {
        $ingredient->update($request->validated());

        return redirect()->route('admin.recipes.edit', $recipe->id)->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Recipe $recipe, Ingredient $ingredient): RedirectResponse
    {
        $ingredient->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}