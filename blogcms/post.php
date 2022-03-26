<?php include "./includes/db.php" ?>
<!-- Header -->
<?php include "./includes/header.php" ?>

<!-- Navigation Bar -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container mt-5 mb-5">
    <div class="row">

        <!-- Left Content -->
        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
            }

            $sql = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_all_posts_query = $conn->query($sql);


            while ($row = $select_all_posts_query->fetch_assoc()) {
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];
            ?>

                <!-- First Blog Post -->
                <div class="blog-content">
                    <a class="title" href="post.php?p_id=<?php echo $post_id; ?>">
                        <h2><?php echo $post_title; ?></h2>
                    </a>
                    <p>by <span class="blog_author"><?php echo $post_author; ?></span> <span class="blog_date"> <i class="fa-solid fa-clock-rotate-left"></i> <?php echo $post_date; ?></span></p>
                    <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">
                    <hr>
                    <p class="blog_desc mt-3">
                        <?php echo $post_content; ?>
                    </p>
                </div>


            <?php } ?>

            <!-- Blog Comments -->
            <?php

            if (isset($_POST['create_comment'])) {

                $the_post_id = $_GET['p_id'];

                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                $sql = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                $sql .= "VALUES ($the_post_id , '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now())";

                $create_comment_query = $conn->query($sql);

                if (!$create_comment_query) {
                    die('QUERY FAILED' . mysqli_error($conn));
                }

                $sql = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id";
                $update_comment_count = $conn->query($sql);

                if (!$update_comment_count) {
                    die('Query Failed' . mysqli_error($conn));
                }
            }

            ?>

            <!-- Comments Form -->
            <div class="blog-content">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <!-- AUTHOR -->
                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <label for="Author">Email</label>
                        <input type="email" class="form-control" name="comment_email">
                    </div>
                    <!-- COMMENT -->
                    <div class="form-group">
                        <label for="comment">Your Comment</label>
                        <textarea class="form-control" name="comment_content" rows="3"></textarea>
                    </div><br>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <?php

            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} AND comment_status = 'approved' ORDER BY comment_id DESC ";

            $select_comment_query = mysqli_query($conn, $query);

            if (!$select_comment_query) {
                die('Query Failed' . mysqli_error($conn));
            }

            while ($row = mysqli_fetch_array($select_comment_query)) {
                $comment_author = $row['comment_author'];
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
            ?>

                <!-- Comment -->
                <div class="blog-content">

                    <div class="d-flex">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="images/face_comment_1.jpg" alt="">
                        </a>
                        <div class="media-body ps-3">
                            <h4 class="media-heading"><?php echo $comment_author; ?></h4>
                            <small><?php echo $comment_date; ?></small>
                        </div>
                    </div>

                    <br>
                    <?php echo $comment_content;   ?>
                </div>

            <?php } ?>

            <!-- End Left Content -->
        </div>

        <!-- Right Content -->
        <!-- Side Bar -->
        <?php include "./includes/sidebar.php"; ?>

    </div>
</div>

<!-- Footer -->
<?php include "./includes/footer.php"; ?>