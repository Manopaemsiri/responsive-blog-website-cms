<?php


if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $sql = "SELECT * FROM users WHERE user_id = $the_user_id";
    $select_users_query = $conn->query($sql);

    while ($row = mysqli_fetch_assoc($select_users_query)) {

        $user_id = $row["user_id"];
        $username = $row["username"];
        $user_password = $row["user_password"];
        $user_firstname = $row["user_firstname"];
        $user_lastname = $row["user_lastname"];
        $user_email = $row["user_email"];
        $user_image = $row["user_image"];
        $user_role = $row["user_role"];

        echo "<tr>";
    }
}

if (isset($_POST['edit_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_password = $_POST['user_password'];
    $username = $_POST['username'];
    $user_email  = $_POST['user_email'];

    $sql = "UPDATE users SET 
    user_firstname = '{$user_firstname}', 
    user_lastname = '{$user_lastname}',
    user_role   =  '{$user_role}',
    username = '{$username}', 
    user_email = '{$user_email}',
    user_password   = '{$user_password}' 
    WHERE user_id = {$the_user_id} ";

    $edit_user_query = $conn->query($sql);

    echo "<span style='color:#F1C40F'>User Updated:</span> " . " " . "<a href='users.php'>View Users</a>";
}

?>


<!-- add users form -->
<form action="" method="post" enctype="multipart/form-data" class="mt-3">

    <!-- firstname -->
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <!-- lastname -->
    <div class="form-group">
        <label for="title">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>

    <!-- category -->
    <div class="form-group">
        <select name="user_role">
            <option value="subscriber"><?php echo $user_role; ?></option>
            <?php
            if ($user_role == 'admin') {
                echo '<option value="subscriber">Subscriber</option>';
            } else {
                echo '<option value="admin">Admin</option>';
            }
            ?>
        </select>
    </div>

    <!-- username -->
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

    <!-- email -->
    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
    </div>

    <!-- password -->
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
    </div>

    <!-- create users button -->
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Users">
    </div>
</form>