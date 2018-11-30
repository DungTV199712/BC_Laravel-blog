@extends('home')
@section('content')
    <h1>Edit Blog</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    <div>
        <form method="post" action="{{ route('blogs.update', $blog->id) }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="Name" value= {{ $blog->Name }}>
            </div>
            <div class="form-group">
                <label>Poster</label>
                <input type="text" class="form-control" name="Poster" value= {{ $blog->Poster }}>
            </div>
            <div class="form-group">
                <label>Topic</label>
                <input type="text" class="form-control" name="Topic" value= {{ $blog->Topic }}>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="Description" value= {{ $blog->Description }}>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="Date" value= {{ $blog->Date }}>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <button class="btn btn-success" onclick="window.history.go(-1)">Cancel</button>

        </form>
    </div>
@endsection