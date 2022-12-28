 <?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username     = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Validate username
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter a username.";
  } else {
    // Prepare a select statement
    $sql = "SELECT id FROM users WHERE username = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      
      // Set parameters
      $param_username = trim($_POST["username"]);
      
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        /* store result */
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
          $username_err = "Este usuario ya fue tomado.";
        } else {
          $username = trim($_POST["username"]);
        }
      } else {
        echo "It seems something went wrong.";
      }
    }
    
    // Close statement
    mysqli_stmt_close($stmt);
  }
  
  // Validate password
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter a password.";
  } elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "The password must have at least 6 characters.";
  } else {
    $password = trim($_POST["password"]);
  }
  
  // Validate confirm password
  if (empty(trim($_POST["confirm_password"]))) {
    $confirm_password_err = "Confirm your password.";
  } else {
    $confirm_password = trim($_POST["confirm_password"]);
    if (empty($password_err) && ($password != $confirm_password)) {
      $confirm_password_err = "Password does not match.";
    }
  }
  
  // Check input errors before inserting in database
  if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
    
    // Prepare an insert statement
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
      
      // Set parameters
      $param_username = $username;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
      
      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: login.php");
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
  <title>Register</title>
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
          <h3 class="text-center">Register</h3>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-outline mb-4">
              <label class="form-label" for="username">Username</label>
              <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" value="<?php echo $username; ?>">
              <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password" value="<?php echo $password; ?>">
              <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="confirm_password">Confirm Password</label>
              <input class="form-control form-control-lg" id="confirm_password" name="confirm_password" type="password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
              <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <button class="btn btn-success btn-lg btn-block" type="submit">
              Sign up
            </button>
            <p>Do you already have an account? <a href="login.php">Enter here</a>.</p>
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
