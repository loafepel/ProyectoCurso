@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Articulos

                    <div class="mb-3">
                        <label for="title" class="form-label">Titulo</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}">
                        <div class="form-text">Ingresar titulo</div>

                        <label for="body" class="form-label">Body</label>
                        <input type="text" name="body" class="form-control" value="{{old('body')}}">

                        <div class="form-text">Ingresar body</div>
                    </div>
                    <a href="{{route('posts.store')}}" class="btn btn-sm btn-primary">Crear</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href="{{ route('posts.update', $post) }}" class="btn btn-secondary btn-sm">Editar</a>
                                </td>
                                <td>
                                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                                    
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                    <!--<input type="submit"
                                    value="Eliminar" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Desea eliminar...?')">-->
                                    </form>
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection