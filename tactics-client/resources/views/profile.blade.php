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
                        <div class="modal-body">
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
                    <div class="menu-btn">
                    </div>

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

                        {{-- <form action="{{ route('upload.profile.picture') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="profile_picture">
                            <button type="submit">Upload</button>
                        </form> --}}

                        <h3 class="username-style margin-0 mt-3">Martin Edgar Atole</h3>
                        <p class="gray-text">@UserID{ TC{{ auth()->user()->id }} }</p>
                        <p class="gray-text">Lorem ipsum dolor sit amet. Et dolor eligendi aut quae mollitia aut
                            consequatur consequatur ut corrupti voluptatem qui illum autem. </p>
                        <button type="button" class="border-0 rounded-circle p-2 position-absolute text-primary-color"
                            data-bs-toggle="dropdown" aria-expanded="false" style="right: 0; top:0;">
                            <i class="fa-solid fa-pen-to-square fs-5"></i>
                        </button>
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

            <div class="post-section p-3">
                <ul class="nav nav-tabs nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Likes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Bookmarks</a>
                    </li>
                </ul>
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
</style>
