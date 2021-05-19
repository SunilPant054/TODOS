@extends('todos.layout')

@section('content')

    <div class="display-all">
        <div class="header">
            <h1>All your todos</h1>
            <a href="{{ route('todo.create') }}" class="btn btn-success">Create New</a>
        </div>
        <div class="list">
            <ul>
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session()->get('message') }} </div>
                @elseif ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach ($todos as $todo)
                    <li class="main">
                        @if ($todo->completed)
                            <p class="text-decoration-line-through">{{ $todo->title }}</p>
                        @else
                            <p>{{ $todo->title }}</p>
                        @endif
                        <div>
                            <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-success">
                                <span class="fas fa-edit" />
                            </a>
                            @if ($todo->completed)
                                <span class="fas fa-check text-success check" />
                            @else
                                <span class="fas fa-check text-muted check" />
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
