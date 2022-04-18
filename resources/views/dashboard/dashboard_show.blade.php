@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center ms-5">
            <div class="col-md-8">
                <h1 class="text-center mt-2">{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-primary my-3"><span data-feather="arrow-left-circle" class="me-1"></span>Back</a>
                <a href="/dashboard/posts/{{ $post->id }}/edit" class="btn btn-warning my-3"><span data-feather="edit-3" class="me-1"></span>Edit</a>
                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                    <button onclick="return confirm('Are You Sure To Delete This Post?')" type="submit" class="btn btn-danger my-3"><span data-feather="trash-2" class="me-1"></span>Delete</button>
                </form>

                <img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" class="card-img-top mt-3" alt="..." class="img-fluid" width="500" height="400">

                <p class="fs-5 mt-4">{{ $post->body }}</p>

            </div>
        </div>
    </div>
@endsection