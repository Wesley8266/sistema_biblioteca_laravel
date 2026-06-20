<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Category::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category(); 
        $category->categoria = $request->categoria; 
        $category->save();

        return redirect()->route('categorias.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) { 
        $category = Category::find($id); 
        return view('categorias.edit', compact('category')); 
    } 
 
    public function update(Request $request, $id) { 

        $category = Category::find($id); 
        $category->categoria = $request->categoria; 
        $category->save(); 
    
        return redirect()->route('categorias.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) { 
        $category = Category::find($id); 
        $category->delete(); 
        return redirect()->route('categorias.index'); 
    } 
}
