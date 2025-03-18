<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{route('profile.update')}}" method="POST">
        @csrf
        @method('put')
        <div>
            <input type="text" name="name" placeholder="Nome" value="{{ old('name', $user->name) }}">
            @error('name')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <textarea type="text" name="description" placeholder="Breve resumo">{{ old('description', $user->description) }}</textarea>
            @error('description')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <span>biolinks.com.br/</span>
            <input name="handler" placeholder="@seulink" value="{{ old('handler', $user->handler) }}">
            @error('handler')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        <br>
        
        <a href=" {{ route('dashboard') }}">Cancelar</a>
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>