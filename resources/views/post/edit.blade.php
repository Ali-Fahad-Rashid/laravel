@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">  

  <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Title:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $post->post_title }}" required></br>
    <label for="type">Status</label>
    <select name="type" id="type" class="form-control" value="">
    @if($post->post_status == "Publish")
    <option value="{{ $post->post_status }}">{{ $post->post_status }}</option>
    <option value="Draft">Draft</option>

    
@else 
      <option value="Draft">Draft</option>
      <option value="Publish">Publish</option>
      @endif

    </select></br>
    <label for="base">Choose Image:</label>    </br>

<input type="file" name="file">
    </br>  
    </br>

    <img src="/uploads/{{ $post->post_image }}" height="200" width="325">

      </br>      </br>


    <label for="">Content</label></br>
    <textarea name="content" id="" cols="40" rows="5">{{ $post->post_content }}</textarea></br></br>
    <input type="submit" value="Edit" class="form-control"></br>
  </form>
  </div> <!-- row -->
</div>  <!-- container -->
@endsection