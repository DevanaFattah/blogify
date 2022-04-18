@extends('layouts.dashboard')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
      @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p class="h5">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      @endif

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col-md">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)  
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-primary">
                  <span data-feather="eye"></span>
                </a>
                <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span>
                </a>
                <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button onclick="return confirm('Are You Sure To Delete This Post?')" type="submit" class="badge bg-danger border-0">
                    <span data-feather="trash-2"></span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection

