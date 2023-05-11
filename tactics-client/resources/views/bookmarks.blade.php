@foreach ($bookmarks as $bookmark)
    @if ($bookmark->user_id === auth()->user()->id)
        @foreach ($posts->where('id', $bookmark->post_id) as $post)
            <div class="post p-3 mb-3 position-relative">
                <!-- Add position-relative class here -->
                <!-- profile -->
                <div class="d-flex">
                    <div class="card-profile mt-2 ms-3">
                        @if ($post->user && optional($post->user)->profile_picture)
                            <img src="{{ asset('storage/' . $post->user->profile_picture) }}" class=" rounded-circle">
                        @else
                            <img src="{{ asset('img/default-user-picture.jpg') }}" class=" rounded-circle">
                        @endif
                    </div>

                    <!-- Title -->
                    <div class="ms-5 w-100">
                        <div>
                            <!-- Default dropend button -->
                            <div class="dropdown menu-btn position-absolute top-0 end-0 p-4 me-3">
                                {{-- Hide if not the post owner --}}
                                {{-- Do not allow other users to delete others post --}}
                                @if ($post->user_id === auth()->user()->id)
                                    <button type="button" class="border-0 rounded-circle p-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
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
                                @endif
                                </ul>
                            </div>


                            {{-- It seems that I cannot put this edit-post modal div below it's button, so I'll be putting it here instead :> --}}
                            <!-- Edit post modal -->
                            <div class="modal fade" id="editPostModal" tabindex="-1" data-bs-backdrop="static"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit a post
                                            </h1>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @include('edit-post')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <!-- Name & time posted -->
                                <div class="mt-1">
                                    <h6 class="username-style margin-0">{{ $post->name }} {{ $post->surname }}</h6>
                                    <small class="gray-text fw-light">
                                        <i class="fa-solid fa-clock me-1"></i>
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <h2 class="post-title">
                                {{ $post->title }}
                            </h2>
                            <div class="post-body">
                                <p class="fw-normal">{{ $post->body }}</p>
                            </div>
                            <div class="image-grid">
                                @foreach ($post->images as $image)
                                    <div class="image-box">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Post Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-center align-items-center">
                                @if (!session()->has('liked_post_' . $post->id))
                                    <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="rounded-circle border-0 fs-4 like-btn d-flex me-3 p-2">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="rounded-circle border-0 fs-4 unlike-btn d-flex me-3 p-2">
                                            <i class="fa-regular fa-thumbs-down"></i>
                                        </button>
                                    </form>
                                @endif

                                <p class="m-0 fw-normal">{{ $post->likes }}</p>
                            </div>
                            <div class="d-flex">
                                <div class="me-3">
                                    <button id="comment-button-{{ $post->id }}"
                                        class="p-2 border-0 rounded-pill comment-btn px-4 gray-text"
                                        data-bs-toggle="collapse" data-bs-target="#collapseExample-{{ $post->id }}"
                                        aria-expanded="false" aria-controls="collapseExample-{{ $post->id }}">
                                        Comment
                                        {{-- <a href="/forum/comments/{{ $post->id }}" class="p-2 border-0 rounded-pill comment-btn px-4">Comment</a> --}}
                                    </button>
                                </div>
                                <div class="">                            
                                    @if ($bookmarks->where('post_id', $post->id)->count() > 0)
                                        <button class="bookmark-style rounded-circle border-0 fs-4 d-flex me-3 p-2"
                                            onclick="confirmRemove({{ $post->id }})"><i
                                                id="bookmark-icon-{{ $post->id }}"
                                                class="fa-solid fa-bookmark"></i></button>
                                    @else
                                        <button class="bookmark-style rounded-circle border-0 fs-4 d-flex me-3 p-2"
                                            onclick="addBookmark({{ $post->id }})"><i
                                                class="fa-regular fa-bookmark"></i></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse" id="collapseExample-{{ $post->id }}">
                @include('comments')
            </div>
        @endforeach
    @endif
@endforeach

<script>
    function confirmRemove(post_id) {
        if (window.confirm("Are you sure you want to remove bookmark to post?"))
            removeBookmark(post_id);
    }

    function addBookmark(post_id) {
        $.ajax({
            type: 'POST',
            url: '{{ route('bookmarks.add') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'post_id': post_id
            },
            success: function(response) {
                console.log(response.bookmarked)
                if (response.bookmarked) {
                    //$('#bookmark-icon-' + post_id).removeClass('fa-bookmark').addClass('fa-bookmark-o');
                    //alert('Bookmark Added successfully!');
                } else {
                    //$('#bookmark-icon-' + post_id).removeClass('fa-bookmark-o').addClass('fa-bookmark');
                    //alert('Bookmark ,removed successfully!');
                }
                location.reload();
            }
        });
    }

    function removeBookmark(post_id) {
        $.ajax({
            type: 'POST',
            url: '{{ route('bookmarks.remove') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'post_id': post_id
            },
            success: function(response) {
                console.log(response.bookmarked)
                if (response.bookmarked) {
                    //$('#bookmark-icon-' + post_id).removeClass('fa-bookmark').addClass('fa-bookmark-o');
                    alert('Bookmark Removed successfully!');
                } else {
                    //$('#bookmark-icon-' + post_id).removeClass('fa-bookmark-o').addClass('fa-bookmark');
                    //alert('Bookmark ,removed successfully!');
                }
                location.reload();
            }
        });
    }
</script>

<style scoped>


</style>
