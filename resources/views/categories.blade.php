@extends('layouts.blog')
@section('content')


<div class="container mx-auto grid grid-cols-3 gap-4 mb-5 mt-5 place-content-center">
    @foreach ($categories as $category )
<div class="card w-96 bg-base-100 shadow-xl image-full">
    <figure><img src="https://source.unsplash.com/500x400/?{{ $category->name }}" alt="Shoes" /></figure>
    <div class="card-body">
      <h2 class="card-title">{{ $category->name }}</h2>
      <p>If a dog chews shoes whose shoes does he choose?</p>
      <div class="card-actions justify-end">
        <a href="/posts?categories={{ $category->slug }}" class="btn btn-primary">Go Now</a>
      </div>
    </div>
</div>
@endforeach
</div>

@endsection