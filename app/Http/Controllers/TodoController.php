<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        return view('todos.index', ['todos' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required|string|max:255']);
        Todo::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('todos.index');
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update(['completed' => $request->completed]);
        return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
