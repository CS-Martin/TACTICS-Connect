{{-- @foreach (comments as comment) --}}
{{-- Comments contents here --}}
<div class="comments-section mb-3">
    @foreach ($post->comments as $comment)
        <div class="d-flex mb-2 w-75">
            <img src="{{ asset('img/martin.jpg') }}" alt="" class="rounded-circle profile-pic me-3"><img
                src="" alt="">
            <div class="comments rounded px-4 d-flex justify-content-center align-items-center">
                {{-- Comment body goes here --}}
                <p class="">{{ $comment->body }}</p>
            </div>
        </div>
    @endforeach
</div>
{{-- @endforeach --}}

{{-- commenting input here --}}
<div class="card card-body mb-3">
    {{-- User's profile picture here --}}
    <form id="comment-form-{{ $post->id }}" class="w-100 h-100 d-flex" method="post"
        action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <textarea class="text-break" name="body"></textarea>
        <button type="submit">Submit</button>
    </form>

</div>


<script>
    $('#commentsArea').emojioneArea({
        pickerPosition: 'bottom'
    });

    $(function() {
        $('form.comment-form').submit(function(event) {
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

    .profile-pic {
        width: 2rem;
        height: 2rem;
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
