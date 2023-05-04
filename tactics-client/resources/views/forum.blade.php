@include('layouts.app')
<div class="forum-container">
    <div class="forum-header d-flex">
        <h2 class="">Articles & Discussions</h2>
        <button class="btn btn-info">Create new Post</button>
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
            <div class="post p-4">
                <!-- profile -->
                <div class="d-flex">
                    <div>
                        <i class="fa-solid fa-user fs-1"></i>
                    </div>

                    <!-- Title -->
                    <div class="ms-5">
                        <div>
                            <h1>
                                Are you someone who is fond a fond of fighting games? We have a event that might get you
                                fired up!
                                Join now!
                            </h1>
                        </div>
                        
                        <div>
                            <!-- Name & time posted -->
                            <div class="d-flex">
                                <p class="me-4">Martin Edgar Atole</p>
                                <p>10 minutes ago</p> 
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div>Like</div>
                            <div class="d-flex">
                                <div class="me-3">Comments</div>
                                <div class="">BM</div>
                            </div> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

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
    }

    .post {
        background: rgba(0, 0, 0, 0.02);
        border-radius: 23px;
        height: auto;
        width: auto;
    }
</style>
