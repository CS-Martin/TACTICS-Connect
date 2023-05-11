@include('layouts.app')

<body class="forum-container">
    <div class="">
        <div class="forum-header d-flex justify-content-between">
            <h2 class="title ms-3">ARTICLES & DISCUSSIONS</h2>
            <button type="button" data-bs-toggle="modal" data-bs-target="#createPostModal"
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
        <div class="d-flex container-fluid p-5">
            <div class="sidebar-hero col-3 p-3">
                <div class="mb-1">
                    <button id="post-toggle"
                        class="sidebar-btn p-2 text-start w-100 rounded-pill d-flex border-0  {{ request()->is('forum') ? 'sideActive' : '' }}">
                        <i class="fa-solid fa-circle fs-3 me-3"></i>
                        Discussions
                    </button>
                </div>

                <div>
                    <button id="bookmarks-toggle" class="sidebar-btn p-2 text-start w-100 rounded-pill d-flex border-0">
                        <i class="fa-solid fa-circle fs-3 me-3"></i>
                        Bookmarks
                    </button>
                </div>
            </div>


            <div id="posts-section" class="post-section">
                @if (count($posts) == 0)
                    <div class="post rounded p-3 text-center gray-text">
                        <h6 class="fw-normal m-0">There are no posts yet.</h6>
                    </div>
                @else
                    @include('post')
                @endif
            </div>
            <div id="bookmarks-section" class="post-section my-0" style="display: none;">
                @if (count($bookmarks) == 0)
                    <div class="post rounded p-3 text-center gray-text">
                        <h6 class="fw-normal m-0">There are no bookmarks yet.</h6>
                    </div>
                @else
                    @include('bookmarks')
                @endif
            </div>
        </div>
    </div>
</body>

<script>
    const toggleButton = document.getElementById('bookmarks-toggle');
    const bookmarksContent = document.getElementById('bookmarks-section');
    const toggleButton_post = document.getElementById('post-toggle');
    const postsContent = document.getElementById('posts-section');

    // show bookmarks button
    toggleButton.addEventListener('click', () => {
        if (bookmarksContent.style.display = 'none') {
            bookmarksContent.style.display = 'block';
            postsContent.style.display = 'none';
            toggleButton.classList.add('sideActive');
            toggleButton_post.classList.remove('sideActive');
        } else {
            bookmarksContent.style.display = 'none';
        }
    })

    // show posts button
    toggleButton_post.addEventListener('click', () => {
        if (postsContent.style.display = 'none') {
            postsContent.style.display = 'block';
            bookmarksContent.style.display = 'none';
            toggleButton_post.classList.add('sideActive');
            toggleButton.classList.remove('sideActive');
        } else {
            postsContent.style.display = 'none';
            bookmarksContent.style.display = 'block';
        }
    })
</script>

<style scoped>
    .forum-container {
        background-color: #ffffff;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .forum-header {
        margin-top: 90px;
        margin-left: 180px;
        margin-right: 300px;
    }

    .post-section {
        width: 60%;
        height: 720px;
        overflow: auto
    }

    .title {
        color: rgba(30, 30, 30, 0.53);
        font-family: 'Gilroy-bold', sans-serif;
    }

    .sideActive {
        background: rgba(97, 195, 200, 0.25);
        color: #4BA4A8;
        transition: all 0.3s;
    }
</style>
