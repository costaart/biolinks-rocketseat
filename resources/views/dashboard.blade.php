<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <a href="{{route('profile')}}">Perfil</a>

    <a href="{{route('links.create')}}">Criar um link</a>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif  

    <div class="p-8 bg-blue-100">
        <ul>
            @foreach ($user_links as $link)

            <li style="display: flex; gap: 5px">
                @if(!$loop->last)
                    <form action="{{ route('links.down', $link) }}" method="POST"> 
                        @csrf
                        @method('patch')
                        <button>⬇️</button>
                    </form>
                @endif
                
                @if(!$loop->first)
                    <form action="{{ route('links.up', $link) }}" method="POST"> 
                        @csrf
                        @method('patch')
                        <button>⬆️</button>
                    </form>
                @endif

                <a href="{{route('links.edit', $link)}}">{{ $link->name }}</a>
                <form action="{{route('links.destroy', $link)}}" method="POST" onsubmit=" return confirm('Deseja apagar o registro?')"> 
                    @csrf
                    @method('delete')

                    <button>Deletar</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>


</body>