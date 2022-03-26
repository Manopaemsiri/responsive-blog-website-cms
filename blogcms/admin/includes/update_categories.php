<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Category</label>

        <?php

        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $sql = "SELECT * FROM categories WHERE cat_id = $cat_id";
            $select_categories_id = $conn->query($sql);

            while ($row = $select_categories_id->fetch_assoc()) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

        ?>
                <input value="<?php if (isset($cat_title)) {
                                    echo $cat_title;
                                } ?>" type="text" class="form-control" name="cat_title">

        <?php }
        } ?>

        <?php

        // UPDATE QUERY

        if (isset($_POST['update_category'])) {

            $the_cat_title = $_POST['cat_title'];

            $sql = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
            $update_query = $conn->query($sql);
            if (!$update_query) {
                die("QUERY FAILED" . $conn->query($sql));
            }
        }
        ?>

    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>