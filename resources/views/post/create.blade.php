@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">  

  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="name">Title:</label>
    <input type="text" name="name" id="name" class="form-control" required></br>
    <label for="type">Status</label>
    <select name="type" id="type" class="form-control">
      <option value="Publish">Publish</option>
      <option value="Draft">Draft</option>
    </select></br>
    <label for="base">Header Image:</label>    </br>

<input type="file" name="file">
    </br>    </br>


    <label for="base">Other Image:</label>    </br>

    <input type="file" name="filenames[]" multiple>

    </br> </br>

    <label for="">Content</label></br>
    <textarea name="content" id="" cols="40" rows="5"></textarea></br></br>
    <input type="submit" value="Post" class="form-control"></br>
  </form>
  </div> <!-- row -->
</div>  <!-- container -->


@endsection