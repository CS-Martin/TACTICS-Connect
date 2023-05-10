@extends('layouts.app')

<body class="profile-container">
    <div class="">
        <div class="profile-header text-end">
            <button type="button" data-bs-toggle="modal" data-bs-target="#createPostModal"
                class="create-post-btn p-2 px-4 text-white text-end">
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            @include('create-post')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="d-flex container-fluid p-3">
            <div class="sidebar-hero col-3 p-3">
                <div class="mb-1">
                    <div class="card-profile position-relative border-bottom accordion">
                        <div>
                            @if (auth()->user()->profile_picture)
                                <form id="upload-form" action="{{ route('upload.profile.picture') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <button class="border-0" onclick="openFileInput(event)">
                                        <div class="profile-picture-container">
                                            <div class="profile-picture-overlay rounded-circle">
                                                <i class="fas fa-edit"></i>
                                            </div>
                                            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                                                class="profile-picture rounded-circle">
                                        </div>
                                    </button>
                                    <input id="file-input" type="file" name="profile_picture" class="d-none"
                                        accept="image/*" onchange="uploadPicture(event)">
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
                                    <input id="file-input" type="file" name="profile_picture" class="d-none"
                                        accept="image/*" onchange="uploadPicture(event)">
                                </form>
                            @endif

                        </div>
                        <h3 class="username-style margin-0 mt-3">Martin Edgar Atole</h3>
                        <p class="gray-text">@UserID{ TC{{ auth()->user()->id }} }</p>
                        <p class="gray-text">Lorem ipsum dolor sit amet. Et dolor eligendi aut quae mollitia aut
                            consequatur consequatur ut corrupti voluptatem qui illum autem. </p>
                        <button type="button" class="border-0 rounded-circle p-2 position-absolute text-primary-color"
                            data-bs-toggle="modal" data-bs-target="#editProfile" style="right: 0; top:0;">
                            <i class="fa-solid fa-pen-to-square fs-5"></i>
                        </button>

                    </div>
                    {{-- Modal for creating a post --}}
                    <div class="modal fade" id="editProfile" tabindex="-1" data-bs-backdrop="static"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create a post</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @include('edit-profile')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 position-relative border-bottom">
                        <h5 class="m-0">About me</h5>
                        <ul class="list-style">
                            <div>
                                <li class="text-decoration-none">Education</li>
                                <h6>---</h6>
                            </div>
                            <div>
                                <li>Status</li>
                                <h6>---</h6>
                            </div>
                            <div>
                                <li>Expected year of Graduation</li>
                                <h6>---</h6>
                            </div>
                            <div>
                                <li>More about me</li>
                                <h6>---</h6>
                            </div>
                        </ul>

                        <button type="button" class="border-0 rounded-circle p-2 position-absolute text-primary-color"
                            data-bs-toggle="dropdown" aria-expanded="false" style="right: 0; top:0;">
                            <i class="fa-solid fa-pen-to-square fs-5"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="post-section px-3">
                <div class="backgroundColor">
                    {{-- Header links --}}
                    <ul class="nav nav-tabs nav-fill">
                        <li class="nav-item">
                            <a class="nav-link gray-text" aria-current="page" data-bs-toggle="collapse"
                                href="#profileComments" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link gray-text">Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link gray-text" href="">Likes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link gray-text">Bookmarks</a>
                        </li>
                    </ul>
                </div>
                {{-- <div class="collapse" id="profileComments">
                </div> --}}
                @foreach ($posts->where('user_id', auth()->user()->id) as $post)
                    <div class="post my-3 p-3 position-relative">
                        <div class="d-flex">
                            <div class="card-profile ms-3">
                                @if ($post->user && optional($post->user)->profile_picture)
                                    <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                                        class=" rounded-circle">
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
                                            <button type="button" class="border-0 rounded-circle p-2"
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
                                        @endif
                                        </ul>
                                    </div>

                                    {{-- It seems that I cannot put this edit-post modal div below it's button, so I'll be putting it here instead :> --}}
                                    <!-- Edit post modal -->
                                    <div class="modal fade" id="editPostModal" tabindex="-1"
                                        data-bs-backdrop="static" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit a
                                                        post
                                                    </h1>
                                                    <button type="button" class="btn-close text-dark"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
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
                                            <h6 class="username-style margin-0">{{ $post->name }}</h6>
                                            <small class="gray-text">
                                                <i class="fa-solid fa-clock me-1"></i>
                                                {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-3">
                                    <h2>
                                        {{ $post->title }}
                                    </h2>
                                    <p> {{ $post->body }}</p>
                                    <div class="image-grid">
                                        @foreach ($post->images as $image)
                                            <div class="image-box">
                                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                                    alt="Post Image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-center align-items-center">
                                        @if (!isset($_COOKIE['liked_post_' . $post->id]))
                                            <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="rounded-circle border-0 fs-4 like-btn me-3 p-2">
                                                    <i class="fa-regular fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <p class="">{{ $post->likes }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="me-3">
                                            <button class="p-2 border-0 rounded-pill comment-btn px-4 gray-text"
                                                data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Comment
                                                {{-- <a href="/forum/comments/{{ $post->id }}" class="p-2 border-0 rounded-pill comment-btn px-4">Comment</a> --}}
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
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="collapseExample">
                        @include('comments')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

<script>
    function openFileInput(event) {
        event.preventDefault();
        document.getElementById('file-input').click();
    }

    function uploadPicture(event) {
        event.preventDefault();
        document.getElementById('upload-form').submit();
    }
</script>

<style scoped>
    .profile-container {
        background-color: #f4f4f4;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .profile-header {
        margin-top: 90px;
        margin-left: 180px;
        margin-right: 300px;
    }

    .list-style {
        list-style-type: none;
    }

    .profile-picture {
        height: 12rem;
        width: auto;
    }

    img:hover {
        opacity: 0.5;
    }

    .profile-picture-container {
        position: relative;
        display: inline-block;
    }

    .profile-picture-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust the opacity and color as needed */
    }

    .profile-picture-container:hover .profile-picture-overlay {
        opacity: 1;
    }

    .profile-picture-overlay i {
        color: white;
        /* Adjust the color of the edit icon */
        font-size: 24px;
        /* Adjust the size of the edit icon */
    }

    .card-profile {
        height: 100%;
    }

    .card-profile>img {
        margin-top: 25%;
        width: 3rem;
    }

    .post {
        background: rgba(0, 0, 0, 0.062);
        border-radius: 23px;
        height: auto;
        width: auto;
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

    .menu-btn {
        cursor: pointer;
        height: inherit;
    }

    .menu-btn button {
        background: none;
    }

    .username-style {
        margin: 0;
    }

    .nav.nav-tabs {
        position: sticky;
        top: 0;
        z-index: 1;
        background-color: #ffffff;
        /* Replace with your desired background color */
    }
</style>
