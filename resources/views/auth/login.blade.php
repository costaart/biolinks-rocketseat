<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{route('login')}}" method="POST">
        @csrf
        <div>
            <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}">
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
        
        <button type="submit">Logar</button>
    </form>
</body>
</html>