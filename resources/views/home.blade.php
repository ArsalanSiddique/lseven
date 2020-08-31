@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}


                    @if(session()->has('message'))
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif

                    <form action="/upload" method="POST" class="mt-3" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="profile" class="font-weight-bolder">Profile Picture</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="profile">
                                <label class="custom-file-label" for="profile">Choose file</label>
                            </div>
                            <input type="submit" value="Upload" name="upload_file" class="btn btn-primary float-right mt-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection