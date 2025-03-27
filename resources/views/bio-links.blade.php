<x-layout.app>
    <body>
        <div class="flex flex-col items-center min-h-screen p-6">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body items-center text-center">
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto de perfil" class="w-24 h-24 rounded-full object-cover shadow">
                    
                    <h1 class="text-2xl font-bold">Usuário: {{ $user->name }} <span class="text-gray-500 text-sm">#{{ $user->id }}</span></h1>
                    <h2 class="text-gray-600">{{ $user->description }}</h2>

                    <div class="divider"></div>

                    <ul class="w-full space-y-3">
                        @foreach ($user->links as $link)
                            <li>
                                <a href="{{ $link->link }}" target="_blank" class="btn btn-outline w-full">
                                    {{ $link->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</x-layout.app>
