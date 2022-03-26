<?php

if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$sql = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = $conn->query($sql);

while ($row = $select_posts_by_id->fetch_assoc()) {
    $post_id = $row["post_id"];
    $post_author = $row["post_author"];
    $post_title = $row["post_title"];
    $post_category_id = $row["post_category_id"];
    $post_status = $row["post_status"];
    $post_image = $row["post_image"];
    $post_tags = $row["post_tags"];
    $post_content = $row["post_content"];
    $post_comment_count = $row["post_comment_count"];
    $post_date = $row["post_date"];
}

if (isset($_POST['update_post'])) {

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name']; // show file name // แสดงชื่อไฟล์ 
    $post_image_temp = $_FILES['post_image']['tmp_name']; // แสดงเท็มสำหรับการอัพโหลด

    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $sql = "SELECT * FROM posts WHERE post_id = $the_post_id";
        $select_image = $conn->query($sql);

        while ($row = $select_image->fetch_array()) {
            $post_image = $row['post_image'];
        }
    }

    // update data
    $sql = "UPDATE posts SET 
    post_title = '{$post_title}',
    post_category_id = '{$post_category_id}',
    post_date = now(), 
    post_author = '{$post_author}',
    post_status = '{$post_status}',
    post_image = '{$post_image}',
    post_tags = '{$post_tags}',
    post_content = '{$post_content}' WHERE post_id = {$the_post_id}";

    $update_post = $conn->query($sql);

    echo "<span style='color:#F1C40F'>Post Updated:</span> " . " " . "<a href='posts.php'>View Posts</a>";
}


?>

<form action="" method="post" enctype="multipart/form-data" class="mt-3">

    <!-- TITLE -->
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
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
        <label for="title">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>

    <!-- STATUS -->
    <div class="form-group">
        <select name="post_status" id="">
            <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
            <?php
            if ($post_status == 'published') {
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value='published'>Published</option>";
            }
            ?>
        </select>
    </div>

    <!-- IMAGE -->
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
    </div>

    <!-- TAGS -->
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>

    <!-- CONTENT -->
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <!-- CREATE POST -->
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>