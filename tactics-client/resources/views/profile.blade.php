@extends('layouts.app')

<body class="profile-container">
    <div class="">
        <div class="profile-header text-end">
            <button type="button" data-bs-toggle="modal" data-bs-target="#createPostModal"
                class="create-post-btn p-2 px-4 text-white text-end">
                <i class="fa-regular fa-pen-to-square me-1 fw-bolder fs-5"></i>
                Create new Post
            </button>
        </div>

        <!-- Sidebar -->
        <div class="d-flex container-fluid p-3">
            <div class="sidebar-hero col-3 p-3">
                <div class="mb-1">
                    <div class="menu-btn">
                    </div>

                    <div class="card-profile position-relative border-bottom accordion">
                        <img src="{{ asset('img/martin.jpg') }}" alt="" class="rounded-circle">
                        <h3 class="username-style margin-0 mt-3">Martin Edgar Atole</h3>
                        <p class="gray-text">@UserID</p>
                        <p class="gray-text">Lorem ipsum dolor sit amet. Et dolor eligendi aut quae mollitia aut
                            consequatur consequatur ut corrupti voluptatem qui illum autem. </p>
                        <button type="button" class="border-0 rounded-circle p-2 position-absolute"
                            data-bs-toggle="dropdown" aria-expanded="false" style="right: 0; top:0;">
                            <i class="fa-solid fa-pen-to-square fs-5"></i>
                        </button>
                    </div>

                    <div class="my-3 position-relative">
                        <h4>About me</h4>
                        <p class="mt-3">Education</p>
                        <h4>Status</h4>
                        <p>---</p>
                        <h4>Expected year of Graduation</h4>
                        <p>2025</p>
                        <h4>More about me</h4>
                        <p>---</p>
                        <button type="button" class="border-0 rounded-circle p-2 position-absolute"
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

<style scoped>
    .profile-container {
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .profile-header {
        margin-top: 90px;
        margin-left: 180px;
        margin-right: 300px;
    }
</style>
