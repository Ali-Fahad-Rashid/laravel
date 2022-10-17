@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">  
<div class="col-9">   
<div class="card text-center">
      <img src="/uploads/{{ $post->post_image }}" height="600" width="825">
  <div class="card-body">
    <h5 class="card-title">{{ $post->post_title }}</h5>
    <p class="card-text">{{ $post->post_content }}</p>



@if($post->images)
    @foreach($post->images as $image)
    <img src="/uploads/{{ $image }}" height="100" width="100">
    @endforeach
@endif
<br></br>


    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete</button>
    <a href="{{ route('post.index') }}" class="btn btn-primary">Back to all posts</a>
  <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">Edit</a>
  </form> 

  </div>
  <div class="card-footer text-muted">
  {{ $post->created_at }}
    </div>
</div>  <!-- card -->
</div>  <!-- col -->
 </div>   <!-- row -->
</div>   <!-- container -->
@endsection
