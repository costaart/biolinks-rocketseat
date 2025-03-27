<x-layout.app>
    <body>
        <x-container>
            <div class="flex items-center justify-center min-h-screen w-full"> 
                <div class="card w-96 bg-base-100 shadow-xl mx-auto mt-10">
                    <div class="card-body">
                        <h1 class="card-title text-2xl font-bold">Login</h1>

                        @if (session('message'))
                            <p class="text-red-500">{{ session('message') }}</p>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">E-mail</span>
                                </label>
                                <input class="input input-bordered" type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-red-500 text-xs"> {{ $message }}</span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-control">
                            <label class="label">
                                <span class="label-text">Senha</span>
                            </label>
                            <input class="input input-bordered" type="password" name="password" placeholder="Senha">
                            @error('password')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <button class="btn btn-primary w-full" type="submit">Logar</button>
                    </form>
                </div>
            </div>
        </x-container>
    </body>
</x-layout.app>
