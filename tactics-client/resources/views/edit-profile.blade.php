<div class="container form-group">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @if (auth()->user()->profile_picture)
            <form id="upload-form" action="{{ route('upload.profile.picture') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <button class="border-0 bg-transparent" onclick="openFileInput(event)">
                    <div class="profile-picture-container">
                        <div class="profile-picture-overlay rounded-circle">
                            <i class="fas fa-edit"></i>
                        </div>
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                            class="profile-picture rounded-circle">
                    </div>
                </button>
                <input id="file-input" type="file" name="profile_picture" class="d-none" accept="image/*"
                    onchange="uploadPicture(event)">
            </form>
        @else
            {{-- default user's profile picture --}}
            <form id="upload-form" action="{{ route('upload.profile.picture') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <button class="border-0" onclick="openFileInput(event)">
                    <div class="profile-picture-container">
                        <div class="profile-picture-overlay rounded-circle">
                            <i class="fas fa-edit"></i>
                        </div>

                        <img src="{{ asset('img/default-user-picture.jpg') }}"
                            class="profile-picture rounded-circle d-flex justify-content-center align-items-center">
                    </div>
                </button>
                <input id="file-input" type="file" name="profile_picture" class="d-none" accept="image/*"
                    onchange="uploadPicture(event)">
            </form>
        @endif
        {{-- Change profile picture --}}
        <div class="form-group mb-2">
            <label for="image" class="gray-text">Image:</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
        {{-- post title --}}
        <div class="mb-2">
            <label for="title" class="mb-1 gray-text">Name</label>
            <input name="title" class="title-field form-control" placeholder="{{ Auth::user()->name }}?"
                id="title" disabled>
        </div>

        {{-- body/content --}}
        <div class=" mb-2">
            <label for="floatingTextarea2" class="gray-text">Header</label>
            <textarea name="body" class="form-control" placeholder="Leave a comment here" id="body" required></textarea>
        </div>


        {{-- footer --}}
        <div class="">
            <button type="submit" class="w-100 p-2 create-post-btn text-white">Submit</button>
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
