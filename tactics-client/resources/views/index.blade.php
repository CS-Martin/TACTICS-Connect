@extends('layouts.app')

@section('content')
    <h2>Posts</h2>
    <hr>
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('posts.show', $post->id) }}"><h4>{{ $post->title }}</h4></a>
            </div>
            <div class="card-body">
                <p>{{ $post->body }}</p>
            </div>
        </div>
    @endforeach
@endsection