<?php include "../includes/db.php" ?>

<?php ob_start() ?>
<?php session_start() ?>

<?php
// If not admin, go back to the main page.
if (!isset($_SESSION['user_role']) ) {
    header("Location: ../index.php");
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Navik - HTML header navigation menu</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" href="../css/admin-style.css">
	<link rel="stylesheet" href="../src/vendor/css/reset.css"> <!-- Reset CSS -->
	<link rel="stylesheet" href="../src/modules/bootstrap/dist/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../src/modules/fontawesome/css/all.min.css"> <!-- Font Awesome CSS -->
	<link rel="stylesheet" href="../examples/demo/style.css"> <!-- Demo CSS -->
	<link rel="stylesheet" href="../src/dist/css/navik-fixed-sidebar-menu.min.css"> <!-- Navik navigation CSS -->

	<link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>