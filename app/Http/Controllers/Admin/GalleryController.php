<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\GalleryRequest;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{

    public function store(GalleryRequest $request, Recipe $recipe): RedirectResponse
    {
        if($request->validated()){
            $path = $request->file('path')->store('assets/galleries','public');
            $recipe->galleries()->create($request->except('path') + ['path' => $path]);
        }

        return redirect()->route('admin.recipes.edit', $recipe->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }


    public function edit(Recipe $recipe, Gallery $gallery): View
    {
        return view('admin.galleries.edit', compact('recipe','gallery'));
    }

    public function update(GalleryRequest $request, Recipe $recipe, Gallery $gallery): RedirectResponse
    {
        if($request->validated()){
            if($request->path){
                File::delete('storage/'. $gallery->path);
                $path = $request->file('path')->store('assets/galleries','public');
                $gallery->update($request->except('path') + ['path' => $path]);         
            } else {
                $gallery->update($request->validated());
            }
        }

        return redirect()->route('admin.recipes.edit', $recipe->id)->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Recipe $recipe, Gallery $gallery): RedirectResponse
    {
        File::delete('storage/' . $gallery->path);
        $gallery->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}