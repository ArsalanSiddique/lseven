@extends('todos.layout')

@section('content')

<h2 class="text-center mt-5 mb-5 font-weight-bolder">All your todos <span><a href="{{ route('todo.create') }}" class="btn btn-primary ml-5 mb-2"><i class="fa fa-plus pr-2"></i> Add</a></span> </h2>
<div class="row">
    <div class="col-md-5 col-sm-8 col-xs-12 m-auto">
        <div class="section">
            <x-alert />
            <ul class="list-group list-group-flush">

                @forelse($todos as $todo)

                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-1">
                            @include("todos.complete-button")
                        </div>
                        <div class="col-6">
                            @if($todo->completed)
                            <del>{{ $todo->title }}</del>
                            @else
                            <a href="{{ route('todo.show', $todo->id) }}" style="color: black;text-decoration:none;">{{ $todo->title }}</a>
                            @endif
                        </div>
                        <div class="col-4">
                            <div class="float-right" style="font-size: 18px;">
                                <!-- <a href="/todos/{{ $todo->id }}/edit" style="text-decoration: none;"> <i class="fa fa-edit ml-2 mr-2 text-info"></i> </a> -->
                                <a href="{{ route('todo.edit', $todo->id) }}" style="text-decoration: none;"> <i class="fa fa-edit ml-2 mr-2 text-info"></i> </a>

                                <i class="fa fa-trash text-danger" style="text-decoration: none;cursor:pointer;" onclick=" if(confirm('Are you really want to delete this task?')) { document.getElementById('todo-delete-{{ $todo->id }}').submit() }"></i>
                            </div>
                            <form action="{{ route('todo.destroy', $todo->id) }}" id="todo-delete-{{ $todo->id }}" style="display: none;" method="POST">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                </li>
                @empty

                <p class="text-center">No Task Found, Create A New One</p>

                @endforelse

            </ul>
        </div>
    </div>
</div>

@endsection