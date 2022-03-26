<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5">

  <div class="container-fluid">

    <!-- Logo -->
    <a class="navbar-brand text-uppercase fw-bold">Write <span style="color:orange;">.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

      <!-- nav-links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./registration.php">Register</a>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="d-flex" action="search.php" method="post">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
      </form>

      <!-- end navbar -->
    </div>

    <!-- end container -->
  </div>

</nav>