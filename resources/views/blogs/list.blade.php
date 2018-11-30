@extends('home')

@section('content')
    <h1>Blog List</h1>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    <div class="col-6">

        <form class="navbar-form navbar-left" action="{{ route('blogs.search') }}" method="get">

            @csrf

            <div class="row">

                <div class="col-8">

                    <div class="form-group">

                        <input type="text" class="form-control" placeholder="Search" name="keyword"
                               value="{{ (isset($_GET['keyword'])) ? $_GET['keyword'] : '' }}">

                    </div>

                </div>

                <div class="col-4">

                    <button type="submit" class="btn btn-default">Tìm kiếm</button>

                </div>

            </div>

        </form>

    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Poster</td>
                <td>Topic</td>
                <td>Description</td>
                <td>Date</td>
                <td colspan="3">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->Name }}</td>
                    <td>{{ $blog->Poster }}</td>
                    <td>{{ $blog->Topic }}</td>
                    <td>{{ $blog->Description }}</td>
                    <td>{{ $blog->Date }}</td>
                    <td><a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-secondary">Show</a></td>
                    <td><a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route('blogs.destroy', $blog->id) }}" class="text-danger"
                           onclick="return confirm('ban co chac chan xoa khong')">delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    {{ $blogs->appends(request()->query()) }}
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">ADD</a>

@endsection