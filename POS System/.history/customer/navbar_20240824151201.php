

<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="" alt="#" width="100" height="100" class="d-inline-block align-text-top" style="margin-right: 15%;">
    </a>
    <div style="margin-right: 75%;" >
      <h5 class="text-success" >
        <?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?>
      </h5>
    </div>

    <div class="float-right mt-3">
        <div class=" dropdown mr-4">
            <a href="#" class="text-dissabled dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="margin-left: -5;" ><?php echo $_SESSION['login_name'] ?></a>
              <div class="dropdown-menu" aria-labelledby="account_settings">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> <span>Manage Account</span></a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> <span>Logout</span></a>
              </div>
        </div>
      </div>
  </div>
</nav>