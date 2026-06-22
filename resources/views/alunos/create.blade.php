<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Categoria</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0F0A0A]">

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
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#8A4B2A] transition">
                        <img src="{{ asset('imagens/tag.png') }}" class="w-6"> Categorias
                    </a>
                </li>

                <li>
                    <a href="{{ route('alunos.index') }}"
                       class="flex items-center gap-3 p-3 rounded-lg bg-[#D97706] shadow-lg shadow-[#D97706]">
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
    <main class="ml-64 min-h-screen flex justify-center items-center p-8">

        <div class="w-full max-w-2xl bg-[#171111] border border-[#312322] rounded-3xl shadow-2xl p-8">

            <h1 class="text-3xl font-bold text-[#F5E6D8] mb-2">
               Adicionar Aluno
            </h1>

            <p class="text-[#A89B95] mb-8">
                Cadastre uma novo aluno na biblioteca.
            </p>

            <form action="{{ route('alunos.store') }}" method="POST" class="space-y-6 gap-10">
                @csrf

                <div>
                    <label
                        for="nome"
                        class="block text-[#B9B1AC] font-medium mb-2">
                        Nome do aluno
                    </label>

                    <input
                        id="nome"
                        type="text"
                        name="nome"
                        placeholder="Nome completo do aluno"
                        class="w-full bg-[#211818]
                               border border-[#312322]
                               text-[#EDE6DC]
                               placeholder-[#7D6F69]
                               p-3 rounded-xl mb-5
                               focus:outline-none
                               focus:border-[#E28300]"
                    >
                    <label
                        for="email"
                        class="block text-[#B9B1AC] font-medium mb-2">
                        Email
                    </label>

                    <input
                        id="email"
                        type="text"
                        name="email"
                        required
                        placeholder="Email do aluno"
                        class="w-full bg-[#211818]
                               border border-[#312322]
                               text-[#EDE6DC]
                               placeholder-[#7D6F69]
                               p-3 rounded-xl mb-5
                               focus:outline-none
                               focus:border-[#E28300]"
                    >
                    <?php
                        $turmas = [
                            'Agronegócio',
                            'Informática',
                            'Enfermagem',
                            'Contabilidade',
                            'Massoterapia',
                            'Desenvolvimento de Sistemas'
                        ];
                    ?>
                
                <div class="flex flex-row justify-between">

                    <div class="flex flex-col">
                        <label
                            for="turma"
                            class="block text-[#B9B1AC] font-medium mb-2">
                            Turma
                        </label>

                        <select
                            id="turma"
                            name="turma"
                            required
                            class="w-[280px] bg-[#211818]
                                border border-[#312322]
                                text-[#EDE6DC]
                                p-3 rounded-xl mb-5
                                focus:outline-none
                                focus:border-[#E28300]">

                            <option value="" disabled selected>
                                Selecione uma turma
                            </option>

                            @foreach ($turmas as $turma)
                                <option class="bg-white text-black"
                                    value="{{ $turma }}"
                                    @selected(old('turma') == $turma)>
                                    {{ $turma }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label
                            for="matricula"
                            class="block text-[#B9B1AC] font-medium mb-2">
                            Matrícula
                        </label>

                        <input
                            id="matricula"
                            type="text"
                            name="matricula"
                            required
                            value="{{ old('matricula') }}"
                            placeholder="N° de matrícula do aluno"
                            class="w-[280px] bg-[#211818]
                                border border-[#312322]
                                text-[#EDE6DC]
                                placeholder-[#7D6F69]
                                p-3 rounded-xl mb-5
                                focus:outline-none
                                focus:border-[#E28300]"
                        >
                    </div>

                </div>
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-3 rounded mb-4 mt-4 w-full max-w-2xl">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <div class="flex justify-end gap-4">

                    <a href="{{ route('alunos.index') }}"
                    class="px-5 py-3 rounded-xl bg-[#2A1F1F] text-[#B9B1AC] hover:bg-[#312322] transition">
                        Voltar
                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl
                            bg-[#F59E0B]
                            text-black
                            font-semibold
                            hover:bg-[#FBBF24]
                            shadow-lg shadow-[#F59E0B]/30
                            transition">
                        Salvar Aluno
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>

