
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		/*background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important*/
	}
</style>
<?php
	$email = 'curtisjyross@gmail.com';
	$phone = '+255616593203';
?>
<nav id="sidebar" class='mx-lt-5 bg-white w-10' >
		
		<div class="sidebar-list">
		<h6 class="text-disabled mt-5 text-success" style="margin-left: 50px;" >Shop Insights</h6>
			<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-tachometer-alt mr-3"></i></span> Dashboard</a>
			<hr>
			<br>
			
			<h6 class="text-disabled text-success " style="margin-left: 50px;" >Shop Manager</h6>
			<a href="index.php?page=orders" class="nav-item nav-orders"><span class='icon-field'><i class="fa fa-clipboard-list mr-3"></i></span> Orders</a>
			<!-- <a href="billing/index.php" class="nav-item nav-takeorders"><span class='icon-field'><i class="fa fa-list-ol mr-3"></i></span> Take Orders</a> -->
			
			

			
			<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list-alt mr-3"></i></span>Manage Categories</a>
			<!-- <a href="index.php?page=add-category" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-list-alt mr-3"></i></span>Add Categories</a> -->
			<a href="index.php?page=products" class="nav-item nav-products"><span class='icon-field'><i class="fa fa-th-list mr-3"></i></span>Manage Products</a>
				<!-- <a href="index.php?page=add-product" class="nav-item nav-products"><span class='icon-field'><i class="fa fa-th-list mr-3"></i></span>Add Products</a> -->
				<br>
			<hr>

			<h6 class="text-disabled text-success" style="margin-left: 50px;" >Author Contacts</h6>
				<a href="mailto:curtisjyross@gmail.com" class="nav-item nav-email_author"><span class='icon-field'><i class="fa fa-envelope mr-3"></i></span> Email</a>
				<a href="" target="_blank" class="nav-item nav-visit_website"><span class='icon-field'><i class="fa fa-whatsapp mr-3"></i></span>Whatsapp</a>
			<!-- <div class="mx-2 text-white">Report</div> -->
			
			<?php if($_SESSION['login_type'] == 1): ?>
			<!-- <div class="mx-2 text-white">Systems</div> -->
			<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users mr-3"></i></span>Employees</a>
			<a href="index.php?page=sales_report" class="nav-item nav-sales_report"><span class='icon-field'><i class="fa fa-th-list mr-3"></i></span> Sales Report</a>
			<hr>

			<h6 class="text-disabled  text-success" style="margin-left: 50px;" >Shop Settting</h6>
			<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cogs mr-3" ></i></span> System Settings</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
