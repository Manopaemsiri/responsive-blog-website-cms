<?php include "includes/admin_header.php" ?>

<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>


<div class="navik-side-content p-5" style="background-color: #f6f6fb;">

                <?php
                    
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }

                    switch ($source) {
                        case 'add_user';
                        include "includes/add_user.php";
                        break;

                        case 'edit_user';
                        include "includes/edit_user.php";
                        break;

                        default: 
                        include "includes/view_all_users.php";
                    }
                    
                 ?>

		</div>


<!-- Footer -->
<?php include "includes/admin_footer.php" ?>