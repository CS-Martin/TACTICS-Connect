<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
    <form method="POST" action="{{ route('comment.store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
