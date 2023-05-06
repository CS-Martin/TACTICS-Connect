@include('layouts.app')
<div class="forum-container">
    <div class="forum-header d-flex justify-content-between">
        <h2 class="title">ARTICLES & DISCUSSIONS</h2>
        <button type="button" data-bs-toggle="modal" data-bs-target="#createPostModal" onclick="createPost()"
            class="create-post-btn p-2 px-4 text-white">
            <i class="fa-regular fa-pen-to-square me-1 fw-bolder fs-5"></i>
            Create new Post
        </button>

        {{-- Modal for creating a post --}}
        <div class="modal fade" id="createPostModal" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create a post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('create-post')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="d-flex container-fluid p-5">
        <div class="sidebar-hero col-3 p-3">
            <div class="mb-1">
                <button
                    class="sidebar-btn p-2 text-start w-100 rounded-pill d-flex border-0  {{ request()->is('forum') ? 'sideActive' : '' }}">
                    <i class="fa-solid fa-circle fs-3 me-3"></i>
                    Discussions
                </button>
            </div>

            <div>
                <button class="sidebar-btn p-2 text-start w-100 rounded-pill d-flex border-0">
                    <i class="fa-solid fa-circle fs-3 me-3"></i>
                    Bookmarks
                </button>
            </div>
        </div>

        <div class="post-section">
            @foreach ($posts as $post)
                <div class="post p-4 mb-3 position-relative">
                    <!-- Add position-relative class here -->
                    <!-- profile -->
                    <div class="d-flex">
                        <div class="card-profile ms-3">
                            <img src="{{ asset('img/martin.jpg') }}" alt="" class="rounded-circle">
                        </div>

                        <!-- Title -->
                        <div class="ms-5 w-100">
                            <div>
                                <!-- Default dropend button -->
                                <div class="dropdown menu-btn position-absolute top-0 end-0 p-4 me-3">
                                    <button type="button" class="border-0 rounded-circle p-2" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis fs-4 gray-text"></i>

                                    </button>

                                    {{-- Menu dropdown --}}
                                    <ul class="dropdown-menu bg-dark shadow-lg">
                                        {{-- Edit post --}}

                                        <a href="{{ route('posts.edit', $post->id) }}" data-bs-toggle="modal"
                                            data-bs-target="#editPostModal"
                                            class="text-start border-0 bg-transparent px-3 w-100 text-white py-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </a>

                                        <div class="modal fade" id="editPostModal" tabindex="-1"
                                            data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create a
                                                            post</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @include('create-post')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                </div>

                                <h1>
                                    {{ $post->title }}
                                </h1>
                            </div>

                            <div>
                                <!-- Name & time posted -->
                                <div class="d-flex">
                                    <p class="me-4 username-style">{{ $post->name }}</p>
                                    <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center">
                                    @if (!isset($_COOKIE['liked_post_' . $post->id]))
                                        <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="rounded-circle border-0 fs-4 like-btn d-flex me-3 p-2">
                                                <i class="fa-regular fa-thumbs-up"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <p class="m-0">{{ $post->likes }}</p>
                                </div>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <button class="p-2 border-0 rounded-pill comment-btn px-4">
                                            <a href="/forum/comments/{{ $post->id }}">Comment</a>
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="submit"
                                            class="bookmark-style rounded-circle border-0 fs-4 d-flex me-3 p-2">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            @foreach ($post->comments as $comment)
                                <div>
                                    <h3>{{ $comment->name }}</h3>
                                    <p>{{ $comment->message }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    // function createPost() {
    //     window.location.href = '/posts/create';
    // }
</script>

<style scoped>
    .forum-container {
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .forum-header {
        margin-top: 90px;
        margin-left: 180px;
        margin-right: 390px;
    }

    /* Sidebar */
    .sidebar-hero {
        width: 15%;
        height: 100%;
        margin-left: 120px;
    }

    .post-section {
        width: 60%;
        height: 720px;
        overflow: auto
    }

    .post {
        background: rgba(0, 0, 0, 0.062);
        border-radius: 23px;
        height: auto;
        width: auto;
    }

    .create-post-btn {
        background-color: #4BA4A8;
        border-radius: 8px;
        border: none;
    }

    .title {
        color: rgba(30, 30, 30, 0.53);
    }

    .sidebar-btn {
        color: #888888;
        background: none;
    }

    .sideActive {
        background: rgba(97, 195, 200, 0.25);
        color: #4BA4A8;
    }

    .like-btn {
        color: #888888;
        background: #DFDFDF;
    }

    .comment-btn {
        background: #DFDFDF;
    }

    .menu-btn i:hover,
    .bookmark-style:hover {
        color: #4BA4A8;
    }

    .like-btn:hover,
    .comment-btn:hover {
        background: rgba(97, 195, 200, 0.25);
        color: #4BA4A8;
    }

    .bookmark-style {
        color: #888888;
        background: none;
    }

    .modal-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.267);
    }

    .card-profile {
        height: 100%;
        width: 45px;
    }

    .card-profile img {
        margin-top: 25%;
        width: inherit;
    }

    .menu-btn {
        cursor: pointer;
        height: inherit;
    }

    .menu-btn button {
        background: none;
    }
</style>
