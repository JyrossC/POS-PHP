<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="" alt="<?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?>" width="30" height="24" class="d-inline-block align-text-top">
      <?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?>
    </a>
  </div>
</nav>