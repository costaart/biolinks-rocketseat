<x-layout.app>
    <body>
        <div class="min-h-screen flex flex-col items-center p-6">
            <div class="w-full max-w-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold">Dashboard</h1>
                    <div class="flex gap-4">
                        <a href="{{ route('profile') }}" style="background-color: #2EC4B6; border: none" class="btn btn-outline">Perfil</a>
                        <a href="{{ route('links.create') }}" class="btn btn-primary">Criar um link</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" style="background-color: #FF6B6B; border: none" class="btn btn-outline">Sair</button>
                        </form>
                    </div>
                </div>

                @if (session('message'))
                    <div class="alert alert-success mb-4">
                        {{ session('message') }}
                    </div>
                @endif  

                <div class="card bg-base-100 shadow-xl p-6">
                    <ul class="space-y-4">
                        @foreach ($user_links as $link)
                        <li class="flex items-center justify-between p-3 bg-gray-100 rounded-lg shadow">
                            <div class="flex items-center gap-2">
                                @if(!$loop->last)
                                    <form action="{{ route('links.down', $link) }}" method="POST"> 
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-sm btn-outline border border-gray-400">⬇️</button>
                                    </form>
                                @endif

                                @if(!$loop->first)
                                    <form action="{{ route('links.up', $link) }}" method="POST"> 
                                        @csrf
                                        @method('patch')
                                        <button class="btn btn-sm btn-outline border border-gray-400">⬆️</button>
                                    </form>
                                @endif

                                <a href="{{ route('links.edit', $link) }}" class="text-blue-500 font-semibold hover:underline">
                                    {{ $link->name }}
                                </a>
                            </div>

                            <form action="{{ route('links.destroy', $link) }}" method="POST" onsubmit="return confirm('Deseja apagar o registro?')"> 
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm" style="background-color: #FF914D; color: white; border: none;">Deletar</button>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>
</x-layout.app>
