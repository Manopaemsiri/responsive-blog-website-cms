<!-- Admin Header -->
<?php include "includes/admin_header.php" ?>

<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

<div class="navik-side-content p-5">

    <!-- container start -->
    <div class="container">
        <div class="row">

            <div class="col-md-6">

                <?php

                if (isset($_POST['submit'])) {

                    $cat_title = $_POST['cat_title'];

                    // If the information is empty, show a message.
                    if ($cat_title == "" || empty($cat_title)) {
                        echo "This field should not be empty";
                    } else {

                        // statement is used to insert new records in a table.
                        $sql = "INSERT INTO categories (cat_title) VALUE ('{$cat_title}')";
                        $create_category_query = $conn->query($sql);

                        // Perform a query, check for errors
                        if (!$create_category_query) {
                            die('QUERY FAILED' . mysqli_error($conn));
                        }
                    }
                }
                ?>

                <!-- Insert Data -->
                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat-title">Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                    </div>
                </form>

                <!-- Update Data -->
                <?php
                if (isset($_GET['edit'])) {
                    $cat_id = $_GET['edit'];
                    // link to page
                    include "includes/update_categories.php";
                }
                ?>
            </div>

            <div class="col-md-6">

                <!-- Category Table -->
                <!-- Table Start -->
                <table class="table table-bordered table-hover">

                    <!-- thead start -->
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <!-- thead end -->

                    <!-- tbody start -->
                    <tbody>

                        <?php

                        // statement is used to select data from a database.
                        $sql = "SELECT * FROM categories";
                        $select_categories = $conn->query($sql);

                        // Fetch a result row as an associative array
                        while ($row = $select_categories->fetch_assoc()) {

                            $cat_id = $row["cat_id"];
                            $cat_title = $row["cat_title"];

                            echo "<tr>";
                            echo "<td>{$cat_id}</td>";
                            echo "<td>{$cat_title}</td>";
                            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>

                        <?php

                        // statement is used to delete existing records in a table.
                        if (isset($_GET['delete'])) {

                            $the_cat_id = $_GET['delete'];

                            $sql = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                            $delete_query = $conn->query($sql);
                        }

                        ?>

                    </tbody>
                    <!-- tbody end -->

                </table>
                <!-- Table End -->

            </div>
        </div>
    </div>
    <!-- container end -->
</div>

<!-- Admin Footer -->
<?php include "includes/admin_footer.php" ?>