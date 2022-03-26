        <!-- Right Content -->
        <div class="col-md-4">
            <!-- Login -->
            <div class="form login-form">
                <h5 class="mb-3 text-uppercase"><i class="fa-solid fa-lock"></i> Login</h5>
                <p> (user: demo pass: 1234)</p>
                <!-- search form -->
                <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="input-group mt-3">
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit</button>
                        </span>
                    </div>
                </form>
                <!-- /.input-group -->
            </div>

            <!-- Category -->
            <?php
            $sql = "SELECT * FROM categories ";
            $select_categories_sidebar = $conn->query($sql);

            $sql = "SELECT post_category_id, COUNT(post_category_id) AS count_category FROM posts GROUP BY post_category_id";
            $count_cate_id = $conn->query($sql);




            ?>
            <div class="form category-form mt-3">
                <h5 class="mb-3 text-uppercase">Categories</h5>
                <!-- search form -->
                <form action="includes/login.php" method="post">
                    <div class="line-container">
                        <div class="line"></div>
                    </div>
                    <div class="category-list mt-3">
                        <?php
                        while ($row = $select_categories_sidebar->fetch_assoc()) {
                            $cat_title = $row["cat_title"];

                            echo "<div class='d-flex justify-content-between'>
                                <p>{$cat_title}</p>
                            </div>";
                        }
                        ?>
                    </div>

                </form>
            </div>


            <div class="form category-form mt-3">
                <h5 class="mb-3 text-uppercase">Lasted post</h5>
                <!-- search form -->
                <form action="includes/login.php" method="post">
                    <div class="line-container">
                        <div class="line"></div>
                    </div>

                    <div>
                        <div class="col-md-12">
                            <?php

                            $sql = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 1 ";
                            $last_post = $conn->query($sql);

                            while ($row = $last_post->fetch_assoc()) {
                                $post_image = $row["post_image"];
                                $post_title = $row["post_title"];
                                $post_date = $row["post_date"];

                            ?>

                                <div class="post-heading">
                                    <div class="category-list mt-3">
                                        <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">
                                        <div class="post-content">
                                            <div class="post-text">
                                                <h5 class="mb-3"><?php echo $post_title; ?></h5>
                                            </div>
                                            <div class="post-date d-flex">
                                                <p><i class="fa-solid fa-clock"></i> <?php echo $post_date; ?></p>
                                                <span class="last-post">Lasted Post</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php } ?>
                        </div>
                    </div>




                    <?php

                    $sql = "SELECT *  FROM posts ORDER BY post_id DESC LIMIT 1,3";
                    $last_post = $conn->query($sql);

                    while ($row = $last_post->fetch_assoc()) {
                        $post_image = $row["post_image"];
                        $post_title = $row["post_title"];
                        $post_date = $row["post_date"];
                    ?>
                        <div class="popular_item d-flex mt-3">
                            <div class="col-md-5">
                                <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">



                            </div>
                            <div class="col-md-7 ps-3">
                                <p class="popular_title fw-bold"><?php echo $post_title; ?></p>
                                <p class="popular_date"><?php echo $post_date; ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <!--
                    <div class="popular_item d-flex mt-3">
                        <div class="col-md-5">
                            <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">
                        </div>
                        <div class="col-md-7 ps-3">
                            <p class="popular_title fw-bold">27 Best Tutorials to Learn PHP in 2022</p>
                            <p class="popular_date">July 31, 2021</p>
                        </div>
                    </div>

                    <div class="popular_item d-flex mt-3">
                        <div class="col-md-5">
                            <img src="images/<?php echo $post_image; ?>" class="img-fluid" alt="image-preview">
                        </div>
                        <div class="col-md-7 ps-3">
                            <p class="popular_title fw-bold">27 Best Tutorials to Learn PHP in 2022</p>
                            <p class="popular_date">July 31, 2021</p>
                        </div>
                    </div>
                        -->
                </form>
            </div>
        </div>