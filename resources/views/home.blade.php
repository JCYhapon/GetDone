<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Welcome to the Todo Application</h1>

    @auth
        <p>Welcome back, {{ auth()->user()->name }}!</p>
        <a href="{{ route('todos.index') }}">Go to your Todo List</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <p><a href="{{ route('login.form') }}">Login</a> | <a href="{{ route('register.form') }}">Register</a></p>
    @endauth
</body>

</html>
