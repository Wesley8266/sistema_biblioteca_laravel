<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;
use App\Models\category;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livros::with('categoria')->get();
        return view('livros.index', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::all();

        return view('livros.create', compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if (Livros::where('titulo', $request->titulo)->exists()) {
            return redirect()->route('livros.create')->withErrors([
                'Livro' => 'Esse livro já existe!',
            ])->withInput();
        }
    
        $livro = new Livros();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->categoria_id = $request->categoria_id;
        $livro->save();

        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    
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
    public function edit($id)
    {
        $livro = Livros::find($id);
        $categorias = Category::all();

        return view('livros.edit', compact('livro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'categoria_id' => 'required',
        ]);

        $livro = Livros::findOrFail($id);

        $tituloExiste = Livros::where('titulo', $request->titulo)
            ->where('id', '!=', $id)
            ->exists();

        if ($tituloExiste) {
            return redirect()->route('livros.edit', $id)->withErrors([
                'titulo' => 'Já existe um livro com esse título.',
            ])->withInput();
        }

        $livro->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('livros.index')
            ->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $livro = Livros::find($id);

        $livro->delete();

        return redirect()->route('livros.index')->with('success', "O livro " . $livro["titulo"] . " foi exluído(a) com sucesso!");
    }
}