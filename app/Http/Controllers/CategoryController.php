<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }
    
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'color' => 'required|regex:/^#[0-9a-fA-F]{6}$/'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoría creada correctamente');
    }
    
    public function show(string $id)
    {
        //
    }
    
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'color' => 'required|regex:/^#[0-9a-fA-F]{6}$/'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoría actualizada');
    }

    public function destroy(Category $category)
    {
        if ($category->books()->count() > 0) {
            return back()->with('error', 'No puedes eliminar una categoría con libros asociados');
        }

        $category->delete();

        return back()->with('success', 'Categoría eliminada');
    }
}
