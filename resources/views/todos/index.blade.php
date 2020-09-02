@extends('todos.layout')

@section('content')

<h2 class="text-center mt-5 mb-3 font-weight-bolder">All your todos  <span><a href="/todos/create" class="btn btn-primary ml-3 mb-2 pl-5 pr-5">Add New One</a></span> </h2>
<div class="row">

    <div class="col-md-5 col-xs-12 m-auto">
        <div class="section">
            <x-alert />
            <ul class="list-group list-group-flush">

                @foreach($todos as $todo)

                <li class="list-group-item list-group-item-action">
                    @if($todo->completed)
                    <del>{{ $todo->title }}</del>
                    @else
                    {{ $todo->title }}
                    @endif
                    <div class="float-right" style="font-size: 18px;">
                        <a href=""> <i class="fa fa-trash text-danger" style="text-decoration: none;"></i> </a>
                        <a href="/todos/{{ $todo->id }}/edit" style="text-decoration: none;"> <i class="fa fa-edit ml-2 mr-2 text-info"></i> </a>
                        <a href=""> <i class="fa fa-check text-secondary"></i> </a>
                    </div>
                </li>

                @endforeach

            </ul>
        </div>
    </div>
</div>

@endsection