<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar um Link</title>
</head>
<body>
    <h1>Criar um Link</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{route('links.create')}}" method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
            @error('name')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input name="link" placeholder="Insira seu Link" value="{{ old('link') }}">
            @error('link')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        
        <button type="submit">Salvar</button>
    </form>
</body>
</html>