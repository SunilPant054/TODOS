<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoCreateRequest;
use App\User;

class TodoController extends Controller
{
    public function index()
    {
        $todos = auth()->user()->todos()->orderby('completed')->get();
        // $todos = Todo::orderby('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        $userId = auth()->id;
        $request['user_id'] = $userId;
        Todo::create($request->all());
        // $request->session()->flash('message', 'TODO successfully created.');
        return redirect()->back()->with('message', 'Todo created successfully.');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update($request->all());
        return redirect(route('todo.index'))->with('message', 'Updated');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked As Completed!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked As Incomplete!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task Deleted!');
    }
}
