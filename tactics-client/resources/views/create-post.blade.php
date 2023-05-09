<div class="container form-group">
    <form action="/posts" method="POST">
        @csrf
        {{-- post title --}}
        <div class="mb-2">
            <label for="title" class="mb-1 gray-text">Title</label>
            <input name="title" class="title-field form-control" placeholder="What's on your mind, {{ Auth::user()->name }}?"
                id="title" required>
        </div>

        {{-- body/content --}}
        <div class=" mb-2">
            <label for="floatingTextarea2" class="gray-text">Description</label>
            <textarea name="body" class="form-control" placeholder="Leave a comment here" id="body" required></textarea>
        </div>

        <div class="form-group mb-2">
            <label for="image" class="gray-text">Image:</label>
            <input type="file" name="image" id="image" accept="image/*" class="form-control">
        </div>
        
        {{-- footer --}}
        <div class="">
            <button type="submit" class="w-100 p-2 create-post-btn text-white">Create Post</button>
        </div>

    </form>
</div>

<script>
   $('#title').emojioneArea({
        pickerPosition: 'right',
    });

    $('#body').emojioneArea({
        pickerPosition: 'right'
    });
</script>

<style scoped>
    .title-field {
        height: 60px;
    }
</style>
