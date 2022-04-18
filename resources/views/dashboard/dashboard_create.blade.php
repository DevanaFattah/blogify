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
    <div class="col-md-6">
        <h2>Create Post</h2>
        <form action="/dashboard/posts" method="post">
        @csrf
            <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label h5">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label h5">Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="category" class="h5">Category</label>
                <select class="form-select" id="category" name="category_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)    
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label h5">Body</label>
                <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3">{{ old('body') }}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Post Now</button>
            </div>
        </form>
    </div>
  </div>
</main>
@endsection








