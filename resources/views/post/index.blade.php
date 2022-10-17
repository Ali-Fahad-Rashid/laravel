@extends('layouts.app')
@section('content')
<div class="container">
<p class="mssg">{{ session('mssg') }}</p>
  @foreach($post as $post)
  <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="uploads/{{ $post->post_image }}" height="150" width="190" class=" rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('post.show',$post->id) }}">{{ $post->post_title }}</a></h5>
        <p class="card-text">{{ $post->post_content }}</p>
        <p class="card-text"><small class="text-muted">{{ $post->created_at }}</small></p>
      </div>
    </div>
  </div>
</div>
  @endforeach
</div>
@endsection
