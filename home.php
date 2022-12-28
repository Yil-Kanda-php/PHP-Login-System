<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex h-100 text-center text-white bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar-menu">
      <div class="container-fluid">
        <a class="navbar-brand" href="">Logo</a>
        <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="menu">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="px-3">
      <h1><?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
      <p class="lead">Welcome to our site.</p>
      <p class="lead">
        <a class="btn btn-lg btn-success fw-bold">Learn more</a>
      </p>
    </main>
    <!-- Footer -->
    <div class="container" id="footer">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-5 my-5 border-top">
        <div class="col-md-4 d-flex align-items-center">
          <a href="#" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">Logo</a>
          <span class="text-muted">Derechos reservados</span>
        </div>
        <ul class="col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3">
            <a class="text-muted">twitter</a>
          </li>
          <li class="ms-3">
            <a class="text-muted">facebook</a>
          </li>
          <li class="ms-3">
            <a class="text-muted">tumblr</a>
          </li>
        </ul>
      </footer>
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.bundle.min.js">
  </script>
</body>
</html>
