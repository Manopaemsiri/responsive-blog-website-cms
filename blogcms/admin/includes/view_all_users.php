<div style="overflow-x: auto;">

    <table class="table table-bordered table-hover" style="background-color: #FFFFFF;">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">changeAdmin</th>
                <th scope="col">ChangeSubscriber</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              
            </tr>
        </thead>
        <tbody>

            <?php

            // select all columns form a table
            $sql = "SELECT * FROM users";
            $select_users = $conn->query($sql);

            // output data of each row
            while ($row = $select_users->fetch_assoc()) {

                $user_id = $row["user_id"];
                $username = $row["username"];
                $user_password = $row["user_password"];
                $user_firstname = $row["user_firstname"];
                $user_lastname = $row["user_lastname"];
                $user_email = $row["user_email"];
                $user_image = $row["user_image"];
                $user_role = $row["user_role"];

                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_role</td>";

                echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>

            <?php

            // change to admin
            if (isset($_GET['change_to_admin'])) {
                $the_user_id = $_GET['change_to_admin'];

                $sql = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
                $change_to_admin_query = $conn->query($sql);

                header("Location: users.php");
            }

            // change to subscriber
            if (isset($_GET['change_to_sub'])) {
                $the_user_id = $_GET['change_to_sub'];

                $sql = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
                $change_to_sub_query = $conn->query($sql);

                header("Location: users.php");
            }

            // delete existing records in a table.
            if (isset($_GET['delete'])) {
                $the_user_id = $_GET['delete'];

                $sql = "DELETE FROM users WHERE user_id = {$the_user_id}";
                $delete_query = $conn->query($sql);

                header("Location: users.php");
            }
            ?>

        </tbody>
    </table>
</div>