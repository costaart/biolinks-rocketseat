<x-layout.app>
    <body>
        <div class="flex items-center justify-center min-h-screen w-full">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h1 class="card-title text-2xl font-bold">Perfil</h1>

                    @if(session('message'))
                        <p class="text-red-500">{{ session('message') }}</p>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        
                        <div class="form-control items-center">
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de perfil" class="w-16 h-16 rounded-full object-cover">
                            <input type="file" name="photo" class="file-input file-input-bordered mt-2">
                            @error('photo')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Nome</span>
                            </label>
                            <input class="input input-bordered" type="text" name="name" placeholder="Nome" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Breve resumo</span>
                            </label>
                            <textarea class="textarea textarea-bordered" name="description" placeholder="Breve resumo">{{ old('description', $user->description) }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Biolink</span>
                            </label>
                            <div class="flex items-center gap-2">
                                <span class="text-gray-500">biolinks.com.br/</span>
                                <input class="input input-bordered w-full" name="handler" placeholder="@seulink" value="{{ old('handler', $user->handler) }}">
                            </div>
                            @error('handler')
                                <span class="text-red-500 text-sm"> {{ $message }}</span>
                            @enderror
                        </div>
                        <br>

                        <div class="flex justify-between">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</x-layout.app>
