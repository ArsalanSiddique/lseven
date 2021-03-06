@extends('todos.layout')

@section('content')

<h2 class="text-center mt-5 mb-3 font-weight-bolder">A Simple Todo App</h2>

<div class="row mp-5 mb-5">
    <div class="col-lg-5 col-xs-12 m-auto">
        <div class="section">
            <x-alert />
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="font-weight-bold">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="What next you need to do?">
                </div>
                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description:</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="5" placeholder="Add some description"></textarea>
                </div>

                @livewire('step')
                <input type="submit" value="Submit" class="btn btn-primary btn-block">
                <hr>
                <div style="display: flex;justify-content:center;">
                    <a href="{{ route('todo.index') }}" class="btn btn-light mt-2">Go Back</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection