<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">
    <a class="navbar-brand text-white" href="#">ARFUN E-Learning Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0 ">
      
      <li class="nav-item">
        <a class="nav-link " href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">About</a>
      </li>

      <?php if (!isset($_SESSION['verified_user_id'])) : ?>
      <!-- <li class="nav-item">
        <a class="nav-link " href="register.php">Register</a>
      </li> -->
       <li class="nav-item">
        <a class="nav-link " href="adminLogin.php">Login</a>
      </li>
      
      <?php   else : ?>
      <li class="nav-item">
        <a class="nav-link bg-danger" href="logout.php">Logout</a>
      </li>  
      <?php endif; ?>
    </ul>
    </div>
  </div>
</nav>