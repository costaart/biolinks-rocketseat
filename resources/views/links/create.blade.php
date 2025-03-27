<x-layout.app>
    <body>
        <div class="flex items-center justify-center min-h-screen">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h1 class="card-title text-2xl font-bold">Criar um Link</h1>

                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form action="{{ route('links.create') }}" method="POST">
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
                                <span class="label-text">URL</span>
                            </label>
                            <input class="input input-bordered" type="text" name="link" placeholder="Insira seu Link" value="{{ old('link') }}">
                            @error('link')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>

                        <div class="flex justify-between">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-layout.app>