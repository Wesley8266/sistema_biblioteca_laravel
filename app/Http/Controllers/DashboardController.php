<?php

namespace App\Http\Controllers;
use App\Models\Livros;
use App\Models\Alunos;
use App\Models\Category;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLivros = Livros::count();
        $totalAlunos = Alunos::count();
        $totalCategorias = Category::count();

        $ultimosLivros = Livros::latest()->take(3)->get();

        $ultimosAlunos = Alunos::latest()->take(3)->get();

        return view('dashboard', compact(
            'totalLivros',
            'totalAlunos',
            'totalCategorias',
            'ultimosLivros',
            'ultimosAlunos'
        ));
    }
}
