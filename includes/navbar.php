


 
      
    

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