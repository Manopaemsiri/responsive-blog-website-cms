<!-- Database Connect -->
<?php include "includes/db.php" ?>

<!-- Header -->
<?php include "includes/header.php" ?>

<!-- Navigation Bar -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container mt-5 mb-5">
    <div class="row">
        <!-- Left Content -->
        <div class="col-md-8">

            <?php

            $per_page = 2;

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "";
            }

            if ($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
                $page_1 = ($page * $per_page) - $per_page;
            }

            $post_query_count = "SELECT * FROM posts";
            $find_count = $conn->query($post_query_count);
            $count = mysqli_num_rows($find_count);

            $count = ceil($count / $per_page);

            $sql = "SELECT * FROM posts LIMIT $page_1, $per_page";
            $select_all_posts_query = $conn->query($sql);

            while ($row = $select_all_posts_query->fetch_assoc()) {
                $post_id = $row["post_id"];
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];
                $post_status = $row['post_status'];

                if ($post_status !== 'published') {
                } else {

            ?>
                    <!-- Blog Entries Column -->
                    <div class="blog-content">
                        <a class="title" href="post.php?p_id=<?php echo $post_id; ?>">
                            <h2><?php echo $post_title; ?></h2>
                        </a>
                        <p>by <span class="blog_author"><?php echo $post_author; ?></span> <span class="blog_date"> <i class="fa-solid fa-clock-rotate-left"></i> <?php echo $post_date; ?></span></p>

                        <a href="post.php?p_id=<?php echo $post_id ?>">
                            <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">
                        </a>
                        <p class="blog_desc mt-3">
                            <?php echo $post_content; ?>
                        </p>
                        <a href="post.php?p_id=<?php echo $post_id ?>">
                            <button class="btn btn-primary">Read More</button>
                        </a>
                    </div>

            <?php }
            } ?>

            <!-- Pagination Start -->
            <nav aria-label="Page navigation example" class="container-pagination d-flex justify-content-end">

                <ul class="pagination">

                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <?php
                    for ($i = 1; $i <= $count; $i++) {

                        if ($i == $page) {
                            echo "<li class='page-item'><a class='page-link active_link' href='index.php?page={$i}'>{$i}</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
                        }
                    }
                    ?>

                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>

            </nav>
            <!-- End Pagination -->

        </div>
        <!-- End Left Content -->

        <!-- Side Bar -->
        <?php include "./includes/sidebar.php"; ?>

    </div>

</div>

<!-- Footer -->
<?php include "./includes/footer.php"; ?>