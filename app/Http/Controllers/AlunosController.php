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
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'turma' => 'required',
            'matricula' => 'required',
        ]);

        $matriculaExiste = Alunos::where('matricula', $request->matricula)->exists();
        $emailExiste = Alunos::where('email', $request->email)->exists();

        if ($matriculaExiste && $emailExiste) {
            return redirect()->route('alunos.create')->withErrors([
                'matricula' => 'Já existe um aluno com essa matrícula e esse email.',
            ])->withInput();

        } elseif ($matriculaExiste) {
            return redirect()->route('alunos.create')->withErrors([
                'matricula' => 'Já existe um aluno com essa matrícula.',
            ])->withInput();

        } elseif ($emailExiste) {
            return redirect()->route('alunos.create')->withErrors([
                'email' => 'Já existe um aluno com esse email.',
            ])->withInput();
        }

        $aluno = new Alunos();
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->turma = $request->turma;
        $aluno->matricula = $request->matricula;
        $aluno->save();

        return redirect()->route('alunos.index')
            ->with('success', 'O(A) aluno(a) foi cadastrado(a) com sucesso!');
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'turma' => 'required',
            'matricula' => 'required',
        ]);

        $aluno = Alunos::findOrFail($id);

        $matriculaExiste = Alunos::where('matricula', $request->matricula)
            ->where('id', '!=', $id)
            ->exists();

        $emailExiste = Alunos::where('email', $request->email)
            ->where('id', '!=', $id)
            ->exists();

        if ($matriculaExiste && $emailExiste) {
            return redirect()->route('alunos.edit', $id)->withErrors([
                'matricula' => 'Já existe um aluno com essa matrícula e esse email.',
            ])->withInput();
        }

        if ($matriculaExiste) {
            return redirect()->route('alunos.edit', $id)->withErrors([
                'matricula' => 'Já existe um aluno com essa matrícula.',
            ])->withInput();
        }

        if ($emailExiste) {
            return redirect()->route('alunos.edit', $id)->withErrors([
                'email' => 'Já existe um aluno com esse email.',
            ])->withInput();
        }

        $aluno->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'turma' => $request->turma,
            'matricula' => $request->matricula,
        ]);

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) { 
        $aluno = Alunos::find($id); 
        $aluno->delete(); 
        return redirect()->route('alunos.index')->with('success', "O aluno(a) " . $aluno["nome"] . " foi exluído(a) com sucesso!"); 
    } 
}