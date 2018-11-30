@extends('home')

@section('content')
    <h1>Blog</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Poster</td>
            <td>Topic</td>
            <td>Description</td>
            <td>Date</td>
            <td colspan="2">Action</td>
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
                <td><a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a></td>
                <td><a href="{{ route('blogs.destroy', $blog->id) }}" class="text-danger"
                       onclick="return confirm('ban co chac chan xoa khong')">delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection