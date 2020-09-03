@if($todo->completed)
<i class="fa fa-check text-success pr-2" style="font-size:18px;cursor:pointer;" onclick="document.getElementById('todo-complete-{{ $todo->id }}').submit()"></i>
@else
<i class="fa fa-check text-secondary pr-2" style="font-size:18px;cursor:pointer;" onclick="document.getElementById('todo-complete-{{ $todo->id }}').submit()"></i>
@endif

<form action="{{ route('todo.complete', $todo->id) }}" id="todo-complete-{{ $todo->id }}" style="display: none;" method="POST">
    @csrf
    @method('put')
</form>