@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    @if ($post->image)
                    <img src="{{$post->get_imagen}}" class="card-img-top"><!--get_imagen es para agarrar la imagen del storage, necesario configurar en el post-->

                    @elseif ($post->iframe)
                    <div class="embed-responsive embed-responsive-16by9"></div>
                    {!! $post->iframe !!}
                        
                    @endif
                    <h5 class="card-title">{{$post->title }}</h5>
                    <p class="card-text">
                        
                        {{$post->body}}
                    </p>

                    <!--<div class="card-img-top">

                         @php
                            echo asset($post->image);
                        @endphp

                        @php
                            echo asset('\storage\app\public\posts'.$post->image);
                        @endphp

                        {{$post->image}}

                        <img class="card-img-top" src="\storage\app\public\posts\. {{$post->image}}" alt="Card image cap">
                        </div>-->

                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{$post->user->name}}
                        </em>
                        {{$post->created_at->format('d M Y') }}
                    </p>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
