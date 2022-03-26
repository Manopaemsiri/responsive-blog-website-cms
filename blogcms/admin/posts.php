<?php include "includes/admin_header.php" ?>

<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>


<div class="navik-side-content p-5" style="background-color: #f6f6fb;" >

                <?php
                    
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_post';
                        include "includes/add_post.php";
                        break;

                        case 'edit_post';
                        include "includes/edit_post.php";
                        break;

                        default: 
                        include "includes/view_all_posts.php";
                    }
                    
                 ?>

		</div>


<!-- Footer -->
<?php include "includes/admin_footer.php" ?>