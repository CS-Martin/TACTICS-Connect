@include('layouts.app')
<div class="forum-container">
    <div class="forum-header d-flex justify-content-between">
        <h2 class="">Articles & Discussions</h2>
        <button onclick="createPost()">Create new Post</button>
    </div>

    <!-- Sidebar -->
    <div class="d-flex container-fluid p-4">
        <div class="sidebar-hero col-3">
            <div>
                <h3>Discussions</h3>
            </div>

            <div>
                <h3>Bookmarks</h3>
            </div>
        </div>

        <div class="post-section col-9">
            @foreach ($posts as $post)
                <div class="post p-4">
                    <!-- profile -->
                    <div class="d-flex flex-row">

                        <div>
                            <i class="fa-solid fa-user fs-1"></i>
                        </div>

                        <!-- Title -->
                        <div class="ms-5">
                            <div>
                                <h1>
                                    {{ $post->title }}
                                </h1>
                            </div>

                            <div>
                                <!-- Name & time posted -->
                                <div class="d-flex">
                                    <p class="me-4">{{ $post->name }}</p>
                                    <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p>Likes: {{ $post->likes }}</p>
                                @if (!isset($_COOKIE['liked_post_' . $post->id]))
                                    <form action="{{ route('posts.like', $post->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Like</button>
                                    </form>
                                @endif
                                <div class="d-flex">
                                    <div class="me-3">Comments</div>
                                    <div class="">BM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function createPost() {
        window.location.href = '/posts/create';
    }
</script>

<style scoped>
    .forum-container {
        height: 100vh;

        margin: 0;
        padding-top: 90px;

    }

    /* Sidebar */
    .sidebar-hero {
        width: 20%;
        height: 100vh;
    }

    .post-section {
        width: 60%;
        height: 100hv;
        overflow-y: scroll;
    }

    .post {
        background: rgba(0, 0, 0, 0.02);
        border-radius: 23px;
        height: auto;
        width: auto;
    }
</style>
