@extends("todos.layout")

@section("content")

<h2 class="text-center mt-5 mb-5 font-weight-bolder">Update your todo</h2>
<div class="row mt-5">
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12 m-auto">
        <div class="section">
            <x-alert />
            <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                @csrf
                @method("patch")
                <div class="form-group">
                    <label for="title" class="font-weight-bold">Title:</label>
                    <input type="text" name="title" id="title" value="{{ $todo->title }}" class="form-control" placeholder="What next you need to do?">
                </div>
                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="5" cols="30">{{ $todo->description }}</textarea>
                </div>
                <input type="submit" value="Update Todo" class="btn btn-primary btn-block">
                <hr>
                <div style="display: flex;justify-content:center;">
                    <a href="{{ route('todo.index') }}" class="btn btn-light mt-2">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection