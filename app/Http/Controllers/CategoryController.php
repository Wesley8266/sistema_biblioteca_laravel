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
        $request->validate([
            'categoria' => 'required|max:255',
        ]);

        if (Category::where('categoria', $request->categoria)->exists()) {
            return redirect()->route('categorias.create')->withErrors([
                'categoria' => 'Essa categoria já existe!',
            ])->withInput();
        }

        $category = new Category();
        $category->categoria = $request->categoria;
        $category->save();


            return redirect()->route('categorias.index')
                ->with('success', 'Categoria cadastrada com sucesso!');
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
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria' => 'required|max:255',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return back()->withErrors([
                'categoria' => 'Categoria não encontrada.',
            ])->withInput();
        }

        // Verifica se outra categoria com o mesmo nome existe
        if (Category::where('categoria', $request->categoria)
            ->where('id', '!=', $id)
            ->exists()) {
            return back()->withErrors([
                'categoria' => 'Não é possivel alterar o nome da categoria, pois já existe essa uma categoria com esse nome .',
            ])->withInput();
        }

        $category->categoria = $request->categoria;
        $category->save();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) { 
        $category = Category::find($id); 
        $category->delete(); 
        return redirect()->route('categorias.index')->with('success', "Categoria " . $category["categoria"]. " excluída sucesso!"); 
    } 
}
