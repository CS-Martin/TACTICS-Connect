<div class="container form-group">
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- post title --}}
        <div class="mb-2">
            <label for="title" class="mb-1 gray-text">Title</label>
            <input name="title" class="form-control" required
                placeholder="What's on your mind, {{ Auth::user()->name }}?" id="editPostTitle">
        </div>

        {{-- body/content --}}
        <div class=" mb-2">
            <label for="floatingTextarea2" class="gray-text">Description</label>
            <textarea name="body" class="form-control" required placeholder="Leave a comment here" id="editPostBody"></textarea>
        </div>

        {{-- footer --}}
        <div class="">
            <button type="submit" class="w-100 p-2 create-post-btn text-white" id="">Update Post</button>
        </div>

    </form>
</div>

<script>
    $('#editPostTitle').emojioneArea({
        pickerPosition: 'right',
    });

    $('#editPostBody').emojioneArea({
        pickerPosition: 'right'
    });
</script>

<style scoped>
    .title-field {
        height: 60px;
    }

    .create-post-btn {
        background-color: #4BA4A8;
        border-radius: 8px;
        border: none;
    }
</style>
