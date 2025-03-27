<x-layout.app>
    <body>
        <x-container>
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h1 class="card-title text-2xl font-bold">Register</h1>

                    @if (session('message'))
                        <p class="text-red-500">{{ session('message') }}</p>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Nome</span>
                            </label>
                            <input class="input input-bordered" type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">E-mail</span>
                            </label>
                            <input class="input input-bordered" type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Confirme seu e-mail</span>
                            </label>
                            <input class="input input-bordered" type="text" name="email_confirmation" placeholder="Confirme seu e-mail">
                        </div>
                        <br>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Senha</span>
                            </label>
                            <input class="input input-bordered" type="password" name="password" placeholder="Senha">
                            @error('password')
                                <span class="text-red-500 text-xs"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <button class="btn btn-primary w-full" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </x-container>
    </body>
</x-layout.app>
