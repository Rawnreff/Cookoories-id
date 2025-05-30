<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TodoRequest;

class TodoController extends Controller
{
   
    public function store(TodoRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->todos()->create($request->validated());

        return redirect()->route('admin.recipes.edit', $recipe->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Recipe $recipe, Todo $todo): View
    {
        return view('admin.todos.edit', compact('todo', 'recipe'));
    }

    public function update(TodoRequest $request, Recipe $recipe, Todo $todo): RedirectResponse
    {
        $todo->update($request->validated());

        return redirect()->route('admin.recipes.edit', $recipe->id)->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Recipe $recipe, Todo $todo): RedirectResponse
    {
        $todo->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}