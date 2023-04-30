<div>
    <h1>Edit Post</h1>

@if ($errors->any())
    <div>
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <strong>Title:</strong>
        <input type="text" name="title" value="{{ $post->title }}" required>
    </div>

    <div>
        <strong>Body:</strong>
        <textarea name="body" rows="5" required>{{ $post->body }}</textarea>
    </div>

    <button type="submit">Update</button>
</form>
</div>