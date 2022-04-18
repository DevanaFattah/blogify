@extends('layouts.blog')
@section('content')

<article class="prose prose-lg prose-h1:text-black flex justify-center mx-auto">
<h1 class="mt-3">About Me</h1>
</article>
<div class="container m-auto flex justify-center mt-5">
    <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="{{ asset('img/profil1.jpg') }}" alt="Shoes" /></figure>
        <div class="card-body">
          <h2 class="card-title">
            Devana Fattah
          </h2>
          <p>Just a curious student who keep learning</p>
        </div>
      </div>
</div>
</div>


@endsection