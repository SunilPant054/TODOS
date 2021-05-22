@extends('todos.layout')

@section('content')


    <div class="d-flex flex-row header">
        <h1>All your todos</h1>
        <a href="{{ route('todo.create') }}"><span class="fas fa-plus-circle icon" /></a>
    </div>
    <hr>
    <div class="d-flex flex-column">
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
            <li class="d-flex list">
                <div class="button">
                    @include('todos.partials.completeButton')
                </div>
                @if ($todo->completed)
                    <a href="{{ route('todo.show', $todo->id) }}"
                        class="text-decoration-line-through cursor-pointer">{{ $todo->title }}</a>
                @else
                    <a href="{{ route('todo.show', $todo->id) }}" class="cursor-pointer"
                        style="text-decoration:none">{{ $todo->title }}</p>
                @endif

                <div>
                    <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-default">
                        <span class="fas fa-edit" />
                    </a>

                    <span class="fas fa-trash" onclick="event.preventDefault();
                                                        if(confirm('Delete the selected task?')){
                                                            document.getElementById('form-delete-{{ $todo->id }}')
                                                            .submit()}" />
                    <form style="display:none" id="{{ 'form-delete-' . $todo->id }}" method="POST"
                        action="{{ route('todo.destroy', $todo->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            </li>
        @endforeach

    </div>

@endsection
