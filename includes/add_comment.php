
<form action="post.php" method="post" role="form">
    <div class="form-group">
        <label for="comment_author">Name</label>
        <input type="text" class = 'form-control' name = 'comment_author'>
    </div>
    <div class="form-group">
        <label for="comment_email">E-Mail</label>
        <input type="email" class = 'form-control' name = 'comment_email'>
    </div>
    <div class="form-group">
        <label for="comment_content">Comment</label>
        <textarea class="form-control" name = 'comment_content' rows="3"></textarea>
    </div>
    <button type="submit" name = 'submit_comment' class="btn btn-primary">Submit</button>
</form>
