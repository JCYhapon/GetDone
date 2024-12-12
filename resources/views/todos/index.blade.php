<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Todo List</title>
</head>

<body>
    <h1>Your Todo List</h1>

    <form method="POST" action="{{ route('todos.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Add a new todo" required>
        <button type="submit">Add Todo</button>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>
                <form method="POST" action="{{ route('todos.update', $todo) }}" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <input type="checkbox" name="completed" value="1" {{ $todo->completed ? 'checked' : '' }}
                        onchange="this.form.submit()">
                    {{ $todo->title }}
                </form>
                <form method="POST" action="{{ route('todos.destroy', $todo) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
