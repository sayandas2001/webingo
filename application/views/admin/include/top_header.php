<div class="header-area">
	<div class="row align-items-center">
		<!-- nav and search button -->
		<div class="col-md-6 col-sm-8 clearfix">
			<div class="nav-btn pull-left">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<!-- profile info & task notification -->
		<div class="col-md-6 col-sm-4 clearfix">
			<div class="user-profile pull-right">
				<!-- <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $a_session_data['username']; ?> <i class="fa fa-angle-down"></i></h4> -->
				<h4 class="user-name dropdown-toggle" data-toggle="dropdown">Hi, Admin<i class="fa fa-angle-down"></i></h4>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="<?php echo admin_url(); ?>logout">Log Out</a>
				</div>
			</div>
		</div>
	</div>
</div>