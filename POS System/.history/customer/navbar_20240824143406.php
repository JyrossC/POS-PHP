

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid" style="margin-right: 15%;">
    <a class="navbar-brand" href="#">
      <img src="" alt="#" width="30" height="24" class="d-inline-block align-text-top">
    </a>
    <div >
      <h5>
        <?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?>
      </h5>
    </div>
  </div>
</nav>