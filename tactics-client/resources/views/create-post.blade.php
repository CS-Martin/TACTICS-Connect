<div class="container">
    <form action="/posts" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <br>
        <label for="body">Content:</label>
        <textarea name="body" id="body"></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
    
</div>