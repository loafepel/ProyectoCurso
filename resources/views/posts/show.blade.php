@extends('layouts.app')
@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @method('PATCH')

          @csrf
          @if(session('success'))
          <h6 class="alert alert-su"> {{session('success')}} </h6>
          @endif

         @error('title')
          <h6 class="alert alert-danger">{{$message}}</h6>
          @enderror
            <div class="mb-3">
              <label for="title" class="form-label">Titulo</label>
              <input type="text" name="title" class="form-control" value="{{$post->title}}">
              <label for="body" class="form-label">Body</label>
              <input type="text" name="body" class="form-control" value="{{$post->body}}">
              
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>

    </form>
</div>
@endsection
