

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <!-- <img src="" alt="#" width="30" height="24" class="d-inline-block align-text-top" style="margin-right: 15%;">
    </a> -->
    <div style="margin-right: 10%;" >
      <h5 class="text-success" >
        <?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?>
      </h5>
    </div>
  </div>
</nav>