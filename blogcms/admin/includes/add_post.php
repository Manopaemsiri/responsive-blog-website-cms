<?php ob_start() ?>

<?php

// Click a button to add information.
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    // function moves an uploaded file to a new destination.
    move_uploaded_file($post_image_temp, "../images/$post_image");

    // The INSERT INTO statement is used to insert new records in a table.
    $sql = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES ({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";

    $create_post_query = $conn->query($sql);

    echo "<span style='color:#F1C40F'>Post Created:</span> " . " " . "<a href='posts.php'>View Posts</a>";
}

?>

<form action="" method="post" enctype="multipart/form-data" class="mt-3">

    <!-- TITLE -->
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <!-- CATEGORY -->
    <div class="form-group">

        <select name="post_category">
            <?php

            $sql = "SELECT * FROM categories";
            $select_categories = $conn->query($sql);

            while ($row = $select_categories->fetch_assoc()) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>

    </div>

    <!-- AUTHOR -->
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <!-- STATUS -->
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <!-- IMAGE -->
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <!-- TAGS -->
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <!-- CONTENT -->
    <div class="form-group">
        <label for="summernote">Post Content</label>
        <textarea class="form-control " name="post_content" cols="30" rows="10"></textarea>
    </div>

    
    <!-- CREATE POST -->
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>
</form>