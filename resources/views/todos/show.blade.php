@extends('todos.layout')

@section('content')

<h2 class="text-center mt-5 mb-5 font-weight-bolder">Todo Details <span><a href="{{ route('todo.create') }}" class="btn btn-primary ml-5 mb-2"><i class="fa fa-plus pr-2"></i> Add</a></span> </h2>
<div class="row">
    <div class="col-lg-5 col-sm-8 col-xs-12 m-auto">
        <div class="section">
            <x-alert />
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action">
                    <div class="row">

                        <div class="col-12">
                            @if($todo->completed)
                            <p class="text-success">Task Completed!</p>
                            @endif
                        </div>

                        <div class="col-12">
                            <span class="font-weight-bolder">Title:</span>
                            <p> {{$todo->title }}</p>
                        </div>

                        <div class="col-12">
                            <span class="font-weight-bolder">Description:</span>
                            <p> {{ $todo->description }}</p>
                        </div>



                    </div>
                    <hr />
                    <div style="display: flex;justify-content:center;">
                        <a href="{{ route('todo.index') }}" class="btn btn-light mt-2">Go Back</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection