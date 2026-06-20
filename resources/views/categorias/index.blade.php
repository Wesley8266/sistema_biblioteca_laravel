<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
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
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#8A4B2A] transition">
                        <img src="{{ asset('imagens/dashboard.png') }}" class="w-6"> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('categorias.index') }}"
                       class="flex items-center gap-3 p-3 rounded-lg transition  bg-[#D97706] shadow-lg shadow-[#D97706]">
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

        <h2 class="text-3xl font-bold text-[#EDE6DC]">
            Categorias
        </h2>
        <p class="text-[#95887a] mb-4">Gerencie as categorias da biblioteca</p>
        

        <a href="{{ route('categorias.create') }}"
           class="inline-block bg-[#f59e0b] text-[#000000] px-4 py-2 rounded-lg font-semibold hover:bg-[#EDE6DC] transition">
            + Adicionar categoria
        </a>
        
        <div class="overflow-hidden rounded-2xl border border-[#311f16] mt-6">

            <table class="w-full text-left bg-[#181514]">

                <thead>
                    <tr class="bg-[#1b1816]">
                        <th class="text-[#E28300] font-bold py-4 px-4">ID</th>
                        <th class="text-[#E28300] font-bold py-4">Categoria</th>
                        <th class="text-[#E28300] font-bold py-4 px-4 text-center">Ações</th>
                    </tr>
                </thead>

                    @foreach($categorias as $categoria)
                    <tr class="border-b border-[#252120] hover:bg-[#1E1814] transition">
                        <td>
                            <span class="text-[#EDE6DC] px-4">
                                {{ $categoria->id }}
                            </span>
                        </td>
                        <td>
                            <span class="text-[#EDE6DC]">
                                {{ $categoria->categoria }}
                            </span>
                        </td>

                    <td>
                        <div class="flex justify-center items-center mt-4 text-center mb-4">

                            <a href="{{ route('categorias.edit', $categoria->id) }}"
                            class="px-4 py-2 items-end font-medium rounded-lg transition">
                                <img src="{{ asset('imagens/editar.png') }}" alt="biblioteca" class="w-6 object-cover">
                            </a>

                            <form action="{{ route('categorias.destroy', $categoria->id) }}"
                                method="POST"
                                onsubmit="return confirm('Deseja realmente excluir esta categoria?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="px-4 py-2 items-start font-medium rounded-lg transition">
                                        <img src="{{ asset('imagens/deletar.png') }}" alt="biblioteca" class="w-6 object-cover">
                                </button>
                            </form>

                        </div>
                    </td>

                </div>

                </tr>

                @endforeach

            </ul>

        </div>

    </main>

</body>
</html>