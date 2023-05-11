{{-- Comments contents here --}}
<div class="comments-section mb-3">
    @foreach ($post->comments as $comment)
        <div class="d-flex w-75">
            <div class="card-profile ms-3">
                @if ($comment->user && $comment->user->profile_picture)
                    <img src="{{ asset('storage/' . $comment->user->profile_picture) }}"
                        class="profile-picture-comment rounded-circle">
                @else
                    <img src="{{ asset('img/default-user-picture.jpg') }}" class="profile-picture-comment rounded-circle">
                @endif

            </div>
            <div class="comments rounded-pill ms-3 px-4 d-flex justify-content-between align-items-center w-100">
                <div>
                    {{-- Comment body goes here --}}
                    <p class="mb-0 fw-normal">{{ $comment->body }}</p>
                </div>
                <div>
                    {{-- Edit and delete buttons --}}
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>DELETE</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex text-start px-5 ms-4">
            <small class="text-muted fw-light"><i
                    class="fa-solid fa-clock me-1"></i>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
        </div>
    @endforeach
</div>

{{-- commenting input here --}}
<div class="card card-body mb-3">
    {{-- User's profile picture here --}}
    <form id="comment-form-{{ $post->id }}" class="d-flex" method="post" action="{{ route('comments.store') }}">
        @csrf
        @if (auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                class="profile-picture-comment rounded-circle">
        @else
            <img src="{{ asset('img/default-user-picture.jpg') }}" class="profile-picture-comment rounded-circle">
        @endif
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea class="text-break form-control mx-2" name="body" id="comment-body-{{ $post->id }}"></textarea>
        <button type="submit" class="btn-color border-0 text-white rounded submit-button"><i
                class="fa-solid fa-paper-plane"></i></button>
    </form>
</div>

<script>
    $('#body').emojioneArea({
        pickerPosition: 'bottom'
    });


    $(function() {
        $('#comment-form-{{ $post->id }}').submit(function(event) {
            event.preventDefault();
            var form = $(this); // get the current form
            var post_id = form.find('input[name=post_id]').val();
            var body = form.find('textarea[name=body]').val();
            console.log(post_id);
            console.log(body);
            $.ajax({
                type: "POST",
                url: "{{ route('comments.store') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    post_id: post_id,
                    body: body
                },
                success: function(response) {
                    location.reload();
                    return response;
                },
                error: function(response) {
                    return response;
                },
            });
        });
    });
</script>

<style scoped>
    textarea {
        resize: vertical;
        overflow: auto;
        max-height: 500px;
    }

    .submit-button {
        width: 6rem;
    }

    .comments-section {
        margin-left: 70px;
    }

    .comments {
        background: rgba(0, 0, 0, 0.062);
    }

    .comments p {
        margin: 0;
    }
</style>
