@extends('layouts.blog')
@section('content')

@if (request('categories'))
    <input type="hidden" value="{{ request('categories') }}">    
@endif

@if (request('author'))
    <input type="hidden" value="{{ request('author') }}">    
@endif

<div class="container mx-auto text-center relative">
  <div class="form-control">
    <div class="input-group">
      <form action="" method="GET">
        @csrf
      <input type="text" name="search" placeholder="Search…" class="input input-bordered mt-3">
      <button class="btn btn-square mt-3 absolute top-5" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
      </button>
    </form>
    </div>
  </div>
</div>

@if ($posts->count())
    
<div class="container mx-auto mt-6 rounded">
<div class="hero min-h-screen rounded" style="background-image: url(https://source.unsplash.com/500x400/?{{ $posts[0]->category->name }})">
    <div class="hero-overlay bg-opacity-60 rounded"></div>
    <div class="hero-content text-center text-neutral-content rounded">
      <div class="max-w-md">
        <h1 class="mb-5 text-5xl font-bold">{{ $posts[0]->title }}</h1>
        <div class="flex justify-center items-center">
        <p class="mb-5">By <a href="/posts?author={{ $posts[0]->user->name }}" class="hover:underline decoration-sky-500 font-bold">{{ $posts[0]->user->name }}</a> In <a href="/categories" class="hover:underline decoration-sky-500 font-bold">{{ $posts[0]->category->name }}</a></p>
        </div>
        <p class="mb-5">{{ $posts[0]->excerpt }}</p>
        <a class="btn btn-primary">Read More</a>
      </div>
    </div>
  </div>
</div>

<div class="container mx-auto grid grid-cols-3 gap-4 mb-5 mt-5">
@foreach ($posts->skip(1) as $post)
<div class="card w-96 bg-base-100 shadow-xl mt-5 mx-auto">
    <figure><img src="https://source.unsplash.com/500x400/?{{ $post->category->name }}" alt="Shoes" /></figure>
    <div class="card-body">
      <h2 class="card-title">{{ $post->title }}</h2>
      <p class="mb-2 mt-2">By <a href="/posts?author={{ $post->user->id }}" class="hover:underline decoration-sky-500 text-black font-bold">{{ $post->user->name }}</a> In <a href="/posts?categories={{$post->category->id }}" class="hover:underline decoration-sky-500 text-black font-bold">{{ $post->category->name }}</a></p>
      <p>{{ $post->excerpt }}</p>
      <div class="card-actions justify-end">
        <a class="btn btn-primary" href="/posts/{{ $post->slug }}">Read More</a>
      </div>
    </div>
  </div>
@endforeach
</div>

{{ $posts->links() }}

@else
<h1 class="prose prose-lg prose-h1:text-black prose-h1:text-bold text-center">No Posts Found</h1>

@endif


@endsection