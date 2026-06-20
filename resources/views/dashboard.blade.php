<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#1c1716]">

    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-[#1A1212] text-[#EDE6DC] fixed left-0 top-0 flex flex-col border-r border-[#311f16]">

        <div class="p-6 border-b border-[#312322]">
            <h1 class="text-2xl font-bold text-[#BFA76F]">
                Bibliotheca
            </h1>
            <p class="text-sm text-[#A89B95]">
                Sistema de Biblioteca
            </p>
        </div>

        <nav class="flex-1 p-4">
            <ul class="space-y-2">

                <li>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 p-3 rounded-lg bg-[#D97706] shadow-lg shadow-[#D97706] transition">
                        <img src="{{ asset('imagens/dashboard.png') }}" class="w-6"> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('categorias.index') }}"
                       class="flex items-center gap-3 p-3 rounded-lg transition hover:bg-[#8A4B2A] ">
                        <img src="{{ asset('imagens/tag.png') }}" class="w-6"> Categorias
                    </a>
                </li>

                <li>
                    <a href="{{ route('alunos.index') }}"
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#8A4B2A]">
                        <img src="{{ asset('imagens/alunos.png') }}" class="w-6"> Alunos
                    </a>
                </li>

                <li>
                    <a href="{{ route('livros.index') }}"
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#8A4B2A] transition">
                        <img src="{{ asset('imagens/livros.png') }}" class="w-6"> Livros
                    </a>
                </li>

            </ul>
        </nav>

        <div class="p-4 border-t border-[#BFA76F]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full bg-[#BFA76F] text-[#2C2E30] font-semibold py-3 rounded-lg hover:bg-[#ff9500] transition">
                    Sair
                </button>
            </form>
        </div>

    </aside>

    <!-- Conteúdo -->
    <main class="ml-64 p-8">

        <h2 class="text-3xl font-bold text-[#EDE6DC] mb-8">
            BEM VINDO(A) ADMINISTRADOR(A)!
        </h2>

        <!-- Cards -->
        <div class="grid grid-cols-3 gap-6">

            <div class="bg-[#211818] p-6 rounded-xl border border-[#311f16]">
                <a href="{{ route('livros.index') }}">
                    <h2 class="text-[#B9B1AC]">Livros</h2>
                    <p class="text-4xl text-[#E28300]">
                        {{ $totalLivros }}
                    </p>
                </a>
            </div>


            <div class="bg-[#211818] p-6 rounded-xl border border-[#311f16]">
                <a href="{{ route('alunos.index') }}">
                    <h2 class="text-[#B9B1AC]">Alunos</h2>
                    <p class="text-4xl text-[#E28300]">
                        {{ $totalAlunos }}
                    </p>
                </a>
            </div>

            <div class="bg-[#211818] p-6 rounded-xl border border-[#311f16]">
                <a href="{{ route('categorias.index') }}">
                    <h2 class="text-[#B9B1AC]">Categorias</h2>
                    <p class="text-4xl text-[#E28300]">
                        {{ $totalCategorias }}
                    </p>
                </a>
            </div>

        </div>

        <!-- Últimos Livros -->

        <div class="mt-8 bg-[#211818] p-6 rounded-xl grid grid-cols-2 gap-6 border border-[#311f16] ">

            <div class="flex flex-col">

                <h2 class="text-[#EDE6DC] text-xl mb-4">
                    Últimos livros
                </h2>

                <div class="overflow-hidden rounded-2xl border border-[#311f16]">

                    <table class="w-full text-left bg-[#181514]">

                        <thead>
                            <tr class="bg-[#1b1816] text-[#E28300]">
                                <th class="font-bold py-4 px-4">ID</th>
                                <th class="font-bold py-4">Título</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($ultimosLivros as $livro)
                            <tr class="border-b border-[#252120] hover:bg-[#1E1814] transition">

                                <td class="px-4 py-3 text-[#EDE6DC]">
                                    {{ $livro->id }}
                                </td>

                                <td class="py-3 text-[#EDE6DC]">
                                    {{ $livro->titulo }}
                                </td>

                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        
            <div class="flex flex-col">
                <h2 class="text-[#EDE6DC] text-xl mb-4">
                    Últimos alunos
                </h2>

                <div class="overflow-hidden rounded-2xl border border-[#311f16]">

                    <table class="w-full text-left bg-[#181514]">

                        <thead>
                            <tr class="bg-[#1b1816] text-[#E28300]">
                                <th class="font-bold py-4 px-4">ID</th>
                                <th class="font-bold py-4">Nome</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($ultimosAlunos as $aluno)
                            <tr class="border-b border-[#252120] hover:bg-[#1E1814] transition">

                                <td class="px-4 py-3 text-[#EDE6DC]">
                                    {{ $aluno->id }}
                                </td>

                                <td class="py-3 text-[#EDE6DC]">
                                    {{ $aluno->nome }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>

            </div>
            
        </div>

    </main>

</body>
</html>