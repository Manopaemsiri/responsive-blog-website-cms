<?php


if (isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];
    $username = $_POST['username'];
    $user_email  = $_POST['user_email'];

    $sql = "INSERT INTO users (user_id, user_firstname, user_lastname, user_role, username, user_email, user_password) VALUES (NULL, '{$user_firstname}','{$user_lastname}', '{$user_role}','{$username}','{$user_email}','{$user_password}') ";
    $create_user_query = $conn->query($sql);

    echo "<span style='color:#F1C40F'>User Created:</span> " . " " . "<a href='users.php'>View Users</a>";

}

?>

<!-- add users form -->
<form action="" method="post" enctype="multipart/form-data" class="mt-3">

    <!-- firstname -->
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <!-- lastname -->
    <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <!-- category -->
    <div class="form-group">
        <select name="user_role">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <!-- username -->
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <!-- email -->
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>

    <!-- password -->
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

    <!-- create users button -->
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add Users">
    </div>
</form>