<div class="sidebar-menu">
	<div class="sidebar-header">
		<div class="logo">
			<a href="<?php echo admin_url(); ?>dashboard"><img src="<?php echo assets_url(); ?>user/images/logo.png" alt="logo"></a>
		</div>
	</div>
	<div class="main-menu">
		<div class="menu-inner">
			<nav>
				<ul class="metismenu" id="menu">
					<?php $nav_controller_name=$this->router->fetch_class(); ?>
					
					<li <?php if($nav_controller_name=="dashboard"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>dashboard"><i class="ti-dashboard"></i> <span>dashboard</span></a>
					</li>

					<li <?php if($nav_controller_name=="manager"){ ?>class="active"<?php } ?>>
						<a href="<?php echo admin_url(); ?>manager"><i class="ti-receipt"></i> <span>Manager</span></a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
