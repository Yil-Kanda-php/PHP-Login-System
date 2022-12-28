<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Landing Page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar-menu">
    <div class="container-fluid">
      <a class="navbar-brand" href="">Logo</a>
      <button class="navbar-toggler" data-bs-target="#menu" data-bs-toggle="collapse" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#about-us">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#products-list">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact-us">Contact us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button">User</a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="login.php">Login</a>
              </li>
              <li>
                <a class="dropdown-item" href="register.php">Register</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- About us -->
  <section class="text-center container py-5" id="about-us">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">About us</h1>
        <p class="lead text-muted">I'm a web developer, I develop in Java, HTML, php, etc.</p><button class="btn btn-success my-2">More information</button>
      </div>
    </div>
  </section>
  <!-- Products -->
  <div class="py-5 bg-light" id="products-list">
    <div class="container">
      <div class="row py-lg-5 text-center">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Products</h1>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-head">
              <h3 class="text-center">Product number</h3>
            </div>
            <img src="assets/images/macbook.jpg">
            <div class="card-body">
              <p class="card-text">This product is fascinating for the woman and the man.</p><button class="btn btn-success">Add to cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-head">
              <h3 class="text-center">Product number</h3>
            </div>
            <img src="assets/images/macbook.jpg">
            <div class="card-body">
              <p class="card-text">This product is fascinating for the woman and the man.</p><button class="btn btn-success">Add to cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-head">
              <h3 class="text-center">Product number</h3>
            </div>
            <img src="assets/images/macbook.jpg">
            <div class="card-body">
              <p class="card-text">This product is fascinating for the woman and the man.</p><button class="btn btn-success">Add to cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-head">
              <h3 class="text-center">Product number</h3>
            </div>
            <img src="assets/images/macbook.jpg">
            <div class="card-body">
              <p class="card-text">This product is fascinating for the woman and the man.</p><button class="btn btn-success">Add to cart</button>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-head">
              <h3 class="text-center">Product number</h3>
            </div>
            <img src="assets/images/macbook.jpg">
            <div class="card-body">
              <p class="card-text">This product is fascinating for the woman and the man.</p><button class="btn btn-success">Add to cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Contact Form -->
  <div class="container py-5" id="contact-us">
    <div class="row py-lg-5 text-center">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Contact us</h1>
        </div>
      </div>
    <form>
      <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" placeholder="Name" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label" for="emailAddress">Email Address</label>
        <input type="email" id="emailAddress" placeholder="your-email@domain.com" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea id="message" placeholder="Your message" class="form-control"></textarea>
      </div>
      <div class="d-grid">
        <button class="btn btn-success btn-lg" type="submit">Submit</button>
      </div>
    </form>    
  </div>
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
  <script src="bootstrap/js/bootstrap.bundle.min.js">
  </script>
</body>
</html>