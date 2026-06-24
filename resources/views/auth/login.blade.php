<x-guest-layout>
            <form method="POST" action="{{ route('login') }}" class="flex w-full">
                @csrf

                <!-- Imagem -->
                {{-- <div class="w-1/2">
                    <img
                        src="{{ asset('biblioteca.png') }}"
                        alt="biblioteca"
                        class="w-full h-full object-cover"
                    >
                </div> --}}

                <!-- Formulário -->
                <div class="flex flex-col justify-center w-1/2 px-12">

                    <h2 class="text-3xl font-bold text-[#ff9500] mb-4 ">
                        Acesse o Acervo da Biblioteca
                    </h2>

                    <p class="text-[#ffffff] mb-8">
                        Bem-vindo de volta!<br>
                        Entre com suas credenciais para abrir as portas do conhecimento.
                    </p>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-[#ffffff] font-medium mb-2">
                            Email
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="Digite seu email"
                            autofocus
                            autocomplete="username"
                            class="w-[300px] bg-[#4B2E2A] text-white rounded-full border-2 border-[#251715] border-t-2-[#251715]"
                        >
                    </div>

                    <!-- Senha -->
                    <div class="mb-6">
                        <label for="password" class="block text-[#ffffff] font-medium mb-2">
                            Senha
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Digite sua senha"
                            required
                            autocomplete="current-password"
                            class="w-[300px] bg-[#4B2E2A] text-white rounded-full border-2 border-[#251715]"
                        >
                    </div>
                    <a href="{{ route('register') }}">Registre-se</a>
                    @if ($errors->any())
                    <div class="bg-red-900 text-white p-3 rounded-md mb-4 w-[300px] border-2 border-red-950">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- Botão -->
                    <button
                        type="submit"
                        class="w-[300px] py-3 bg-[#c29a6d] text-white font-bold rounded-full transition-colors hover:bg-[#ff9500] hover:text-[#2C2E30]"
                    >
                        Entrar
                    </button>

                </div>

            </form>

        </div>

    </div>
</x-guest-layout>