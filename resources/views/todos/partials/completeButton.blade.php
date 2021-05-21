<div>
    @if ($todo->completed)
        <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{ $todo->id }}').submit()"
            class="fas fa-check text-success check" />
        <form style="display:none" id="{{ 'form-incomplete-' . $todo->id }}" method="POST"
            action="{{ route('todo.incomplete', $todo->id) }}">
            @csrf
            @method('PUT')
        </form>
    @else
        <span onclick="event.preventDefault();document.getElementById('form-complete-{{ $todo->id }}').submit()"
            class="fas fa-check text-muted check" />
        <form style="display:none" id="{{ 'form-complete-' . $todo->id }}" method="POST"
            action="{{ route('todo.complete', $todo->id) }}">
            @csrf
            @method('PUT')
        </form>
    @endif
</div>
