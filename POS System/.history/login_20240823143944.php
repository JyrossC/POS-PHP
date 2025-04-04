<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
// }
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>

  <!-- Adding A Google recaptcha Login validation -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
	function enableSubmitBtn()
	{
		document.getElementById("mySubmitBtn").disabled = false;
	}
</script>

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0;
	    background-image: url('assets/uploads/');
	    background-size: cover;
	}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}

</style>

<body class="bg-light">
	<div class="container mt-5 ">
		<div class="card mt-5 justify-content-center bg-dark">
			<div class="card-body bg-dark">
				<h4 class="text-dark text-center mb-5">
					 System Login
				</h4>
				<form id="login-form" >
					<div class="form-group">
						<div class="input-group mb-2" >
							<div class="input-group-prepend ">
								<div class="input-group-text   border-0"><i class="fa fa-user"></i></div>
							</div>
							<input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="username" name="username" class="form-control border-0" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<div>
							<label for="">Password</label>
						</div>
						<div class="input-group mb-2" >
							<div class="input-group-text   border-0">
								<i class="fa fa-lock"></i>
							</div>
							<input type="password" id="password" name="password" class="form-control border-0" placeholder="Password">
						</div>
					</div>

					<!-- Add Google recaptcha validation -->
					<div class="mb-3">
						<div class="g-recaptcha" data-sitekey="6LeE1-4pAAAAAGMqgDgNadlikWXqpv-cwQncLc8c" data-callback="getElementById" ></div>
					</div>

					<div class="form-check py-3">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label mt-1" for="exampleCheck1"> Remember me</label>
						</div>
					<div class="mb-3">
						<button class="btn btn-primary float-end" id="mySubmitBtn"  >Start Now</button>
					</div>
				</form>
			</div>
		</div>
	</div>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>