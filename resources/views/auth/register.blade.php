<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{route('register')}}" method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
            @error('name')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
            <input type="text" name="email_confirmation" placeholder="Confirme seu e-mail">

            @error('email')
                <span style="color:red"> {{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <input type="password" name="password" placeholder="Senha">
            @error('password')
            <span style="color:red"> {{ $message }}</span>
        @enderror
        </div>
        <br>
        
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>