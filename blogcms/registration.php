<!-- Database Connect -->
<?php include "includes/db.php"; ?>
<!-- Header -->
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($username) && !empty($email) && !empty($password)) {

        // SQL injection prevent 
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "INSERT INTO users (username, user_email, user_password, user_role) VALUES ('{$username}','{$email}', '{$password}', 'subscriber')";
        $register_user_query = mysqli_query($conn, $query);
        if (!$register_user_query) {
            die("QUERY FAILED " . mysqli_error($conn) . '' . mysqli_errno($conn));
        }
            $message = "You Registration has been submitted";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Fields cannot be empty";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
         

    }


     
?>

<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">

                    <div class="form-wrap">
                        <h1 class="mt-5">Register</h1>
                        <!-- Register Form -->
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" class="mt-3">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                            </div>
                            <div class="form-group mt-3">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div> <br>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Register"">
                    </form>
                 
                </div>
            </div> 
                    <div class=" col-md-6">
                            <img src="images/women with laptop working from_5348500.png" alt="img-regis" class="img-fluid">
                    </div>
                </div>
            </div>
    </section>

    <hr>

    <!-- Copyright -->
    <div class="copy-right">
        <p style="font-size: 12px;">Copyright &copy Manop Aemsiri 2022</p>
    </div>
</div>

<!-- Footer -->
<?php include "includes/footer.php"; ?>