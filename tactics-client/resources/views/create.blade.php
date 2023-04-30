@extends('layouts.app')
@section('content')
<div>
    <h1>Create Post</h1>

    @if ($errors->any())
        <div>
            <strong>Ooof!</strong> There were some problems with your input. <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li> 
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <strong>Body:</strong>
                <textarea name="body" id="" rows="5" required> {{ old('body') }}</textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
</div>
@endsection