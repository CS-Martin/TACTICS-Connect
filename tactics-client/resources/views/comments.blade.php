{{-- @foreach (comments as comment) --}}
{{-- Comments contents here --}}
<div class="comments-section mb-3">
    @foreach ($post->comments as $comment)
        <div class="d-flex mb-2 w-75">
            <div class="card-profile ms-3">
                @if ($post->user && optional($post->user)->profile_picture)
                    <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                        class="profile-picture-comment rounded-circle">
                @else
                    <img src="{{ asset('img/default-user-picture.jpg') }}" class="profile-picture rounded-circle">
                @endif
            </div>
            <div class="comments rounded px-4 d-flex justify-content-between align-items-center w-100">
                <div>
                    {{-- Comment body goes here --}}
                    <p class="mb-0">{{ $comment->body }}</p>
                    <p class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</p>
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
    @endforeach
</div>
{{-- @endforeach --}}

{{-- commenting input here --}}
<div class="card card-body mb-3">
    {{-- User's profile picture here --}}
    <form id="comment-form-{{ $post->id }}" class="d-flex" method="post" action="{{ route('comments.store') }}">
        @csrf
        @if ($post->user && optional($post->user)->profile_picture)
            <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                class="profile-picture-comment rounded-circle">
        @else
            <img src="{{ asset('img/default-user-picture.jpg') }}" class="profile-picture rounded-circle">
        @endif
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea class="text-break form-control mx-2" name="body" id="comment-body-{{ $post->id }}"></textarea>
        <button type="submit" class="btn-color border-0 text-white rounded">Submit</button>
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
                    return response;
                },
                error: function(response) {
                    return response;
                }
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

    .profile-picture-comment {
        width: auto;
        height: 3rem;
    }

    .comments-section {
        margin-left: 70px;
    }

    .comments {
        background: rgba(0, 0, 0, 0.151);
    }

    .comments p {
        margin: 0;
    }
</style>
