<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alunos;

class AlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Alunos::all();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alunos = new Alunos(); 
        $alunos->nome = $request->nome; 
        $alunos->email = $request->email;
        $alunos->turma = $request->turma;
        $alunos->matricula = $request->matricula;
        $alunos->save();

        return redirect()->route('alunos.index'); 
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
        $alunos = Alunos::findOrFail($id);

        $turmas = [
            'Agronegócio',
            'Informática',
            'Enfermagem',
            'Contabilidade',
            'Massoterapia',
            'Desenvolvimento de Sistemas'
        ];

        return view('alunos.edit', compact('alunos', 'turmas'));
    }
 
    public function update(Request $request, $id) { 

        $alunos = Alunos::find($id); 
        $alunos->nome = $request->nome; 
        $alunos->email = $request->email; 
        $alunos->turma = $request->turma; 
        $alunos->matricula = $request->matricula; 
        $alunos->save(); 

        return redirect()->route('alunos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) { 
        $aluno = Alunos::find($id); 
        $aluno->delete(); 
        return redirect()->route('alunos.index'); 
    } 
}