 <?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: home.php");
  exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username     = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter your username.";
  } else {
    $username = trim($_POST["username"]);
  }
  
  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }
  
  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      
      // Set parameters
      $param_username = $username;
      
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);
        
        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();
              
              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"]       = $id;
              $_SESSION["username"] = $username;
              
              // Redirect user to welcome page
              header("location: home.php");
            } else {
              // Display an error message if password is not valid
              $password_err = "The password you have entered is invalid.";
            }
          }
        } else {
          // Display an error message if username doesn't exist
          $username_err = "There is no account registered with that username.";
        }
      } else {
        echo "Something went wrong, please try again.";
      }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
  }
  
  // Close connection
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img class="img-fluid" src="assets/images/user.svg">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <h3 class="text-center">Login</h3>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-outline mb-4 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
              <label class="form-label" for="username">Username</label>
              <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-outline mb-4 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
              <label class="form-label" for="password">Password</label>
              <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
              <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <button class="btn btn-success btn-lg btn-block" type="submit">
              Sign in
            </button>
            <p>You do not have an account? <a href="register.php">Register now</a>.</p>
          </form>
        </div>
      </div>
    </div>
  </section>
  <a href="index.php">
    <img alt="home" class="sticky btn-sticky" id="home" src="assets/images/home.png">
  </a>
</body>
</html>