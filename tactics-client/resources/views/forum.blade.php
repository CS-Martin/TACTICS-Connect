@include('layouts.app')
<div class="forum-container"> 
    <div class="forum-header d-flex justify-content-between">
        <h2 class="">Articles & Discussions</h2>
        <button onclick="createPost()">Create new Post</button> 
    </div>

    <div class=>
        
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
    }

    .forum-header {
        margin-top: 100px;
        margin-left: 10%;
        margin-right: 10%;
    }
</style>
