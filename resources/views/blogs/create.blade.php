@extends('home')
@section('content')
    <h1>Add Blog</h1>
    <div>
        <form action="{{ route('blogs.validate') }}" method="get">

            <form method="post" action="{{ route('blogs.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="Name">
                    <div class="error-message">
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('Name') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Poster</label>
                    <input type="text" class="form-control" name="Poster">
                    <div class="error-message">
                        @if ($errors->any())
                            <p style="color:red">{{ $errors->first('Poster') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label>Topic</label>
                    <input type="text" class="form-control" name="Topic">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" name="Description">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="Date">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <button class="btn btn-success" onclick="window.history.go(-1); return false;">
                    Cancel
                </button>
            </form>

        </form>

    </div>
@endsection