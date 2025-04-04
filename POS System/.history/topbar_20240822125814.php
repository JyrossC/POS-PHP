<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<nav class="navbar navbar-light fixed-top bg-white">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-2 float-left text-dark">
         <img src="assets/uploads/.<?php echo $_SESSION['system']['cover_img'] ?>)" width="180px" alt="Logo" >
      </div>
       <div class="col-md-8 float-left text-dark mt-3">
       <h3><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></h3>
      </div>
      <div id="google_translate_element"></div>
	  	<div class="float-right mt-3">
        <div class=" dropdown mr-4">
            <a href="#" class="text-dissabled dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h6><?php echo $_SESSION['login_name'] ?> </h6></a>
              <div class="dropdown-menu" aria-labelledby="account_settings">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>