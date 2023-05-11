{{-- Comments contents here --}}
<div class="comments-section mb-3">
    @foreach ($post->comments as $comment)
        <div class="w-100 d-flex">
            <div class="d-flex w-75 comments">
                <div class="card-profile mt-2 ms-3">
                    @if ($comment->user && $comment->user->profile_picture)
                        <img src="{{ asset('storage/' . $comment->user->profile_picture) }}"
                            class="profile-picture-comment rounded-circle">
                    @else
                        <img src="{{ asset('img/default-user-picture.jpg') }}"
                            class="profile-picture-comment rounded-circle">
                    @endif

                </div>
                <div
                    class="comments rounded-pill ms-3 px-4 py-2 d-flex justify-content-between align-items-center w-100">
                    <div>
                        {{-- Comment body goes here --}}
                        <h6 class="username-style margin-0">{{ $post->name }} {{ $post->surname }}</h6>
                        <p class="mb-0 fw-normal">{{ $comment->body }}</p>
                    </div>
                    <div class="">
                        {{-- Edit and delete buttons --}}
                        {{-- Hide if not the post owner --}}
                        {{-- Do not allow other users to delete others post --}}
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @if ($comment->user_id === auth()->user()->id)
                                <button type="button"
                                    class="border-0 rounded-circle p-2 bg-transparent h-auto  show"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis fs-4 gray-text"></i>
                                </button>

                                {{-- Menu dropdown --}}
                                <ul class="dropdown-menu bg-dark shadow-lg">
                                    <!-- Button trigger modal -->
                                    <button type="button"
                                        class="text-start border-0 bg-transparent px-3 w-100 text-white py-1"
                                        data-bs-toggle="modal" data-bs-target="#editPostModal">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </button>

                                    {{-- Delete post --}}
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-start border-0 bg-transparent px-3 text-danger w-100 py-1">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </ul>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex text-start px-5 ms-4 mb-2">
            <small class="text-muted fw-light ms-3"><i
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
    .show {
        opacity: 1;
    }

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
