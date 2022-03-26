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

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                $search_query = $conn->query($sql);

                // Perform a query, check for errors
                if (!$search_query) {
                    die("QUERY FAILED" . mysqli_error($conn));
                }
                // If no information is found to display a message 
                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h1> NO RESULT </h1>";
                } else {
                    // Fetch a result row as an associative array:
                    while ($row = mysqli_fetch_assoc($search_query)) {

                        $post_title = $row["post_title"];
                        $post_author = $row["post_author"];
                        $post_date = $row["post_date"];
                        $post_image = $row["post_image"];
                        $post_content = $row["post_content"];

            ?>
                        <!-- Blog Entries Column -->
                        <div class="blog-content">
                            <a class="title" href="post.php?p_id=<?php echo $post_id; ?>">
                                <h2><?php echo $post_title; ?></h2>
                            </a>
                            <p>by <span class="blog_author"><?php echo $post_author; ?></span> <span class="blog_date"> <i class="fa-solid fa-clock-rotate-left"></i> <?php echo $post_date; ?></span></p>
                            <a href="search.php?p_id=<?php echo $post_id ?>">
                                <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">
                            </a>
                            <p class="blog_desc mt-3">
                                <?php echo $post_content; ?>
                            </p>
                            <button class="btn btn-primary">Read More</button>
                        </div>
                        <hr>
            <?php  }
                }
            }

            ?>

            <!-- End Left Content -->
        </div>

        <!-- Right Content -->
        <!-- Side Bar -->
        <?php include "./includes/sidebar.php"; ?>

    </div>
</div>

<!-- Footer -->
<?php include "./includes/footer.php"; ?>