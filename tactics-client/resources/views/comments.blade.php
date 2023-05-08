{{-- @foreach (comments as comment) --}}
{{-- Comments contents here --}}
<div class="comments-section mb-3">
    <div class="d-flex mb-2 w-75">
        <img src="{{ asset('img/martin.jpg') }}" alt="" class="rounded-circle profile-pic me-3"><img src=""
            alt="">
        <div class="comments rounded px-4 d-flex justify-content-center align-items-center">
            {{-- Comment body goes here --}}
            <p class="">Hi I'm Martin Edgar </p>
        </div>
    </div>

    <div class="d-flex mb-3 w-75">
        <img src="{{ asset('img/martin.jpg') }}" alt="" class="rounded-circle profile-pic me-3"><img
            src="" alt="">
        <div class="comments rounded px-4 d-flex justify-content-center align-items-center">
            {{-- Comment body goes here --}}
            <p class="">Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota
                Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota Pota </p>
        </div>
    </div>

</div>
{{-- @endforeach --}}

{{-- commenting input here --}}
<div class="card card-body mb-3">
    {{-- User's profile picture here --}}
    <div class="d-flex">
        <img src="{{ asset('img/martin.jpg') }}" alt="" class="rounded-circle profile-pic me-3"><img
            src="" alt="">
        <textarea class="comment-field" name="comments" id="commentsArea"
            placeholder="Write your comment here...."></textarea>
    </div>
</div>


<script>
    $('#commentsArea').emojioneArea({
        pickerPosition: 'bottom'
    });
</script>

<style scoped>
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

    .comment-field {
        height: 60px;
        width: 100%;
    }
</style>
