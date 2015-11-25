<div class="row">

<<<<<<< HEAD
	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/box_open', 'Shortcuts'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-user', 'Account', 'panel/account'); ?>
			<?php echo modules::run('adminlte/widget/app_btn', 'fa fa-sign-out', 'Logout', 'panel/logout'); ?>
		<?php echo modules::run('adminlte/widget/box_close'); ?>
	</div>

	<div class="col-md-4">
		<?php echo modules::run('adminlte/widget/info_box', 'yellow', $count['users'], 'Users', 'fa fa-users', 'user'); ?>
	</div>
	
=======
	<div class="col-md-4">	
		<?php echo box_open('Shortcuts'); ?>
			<?php echo app_btn('user', 'Account', 'account'); ?>
			<?php echo app_btn('sign-out', 'Logout', 'account/logout'); ?>
		<?php echo box_close(); ?>

		<?php echo box_open('Welcome!'); ?>
			<p>Demonstration of functions from adminlte_helper: </p>
			<ul>
				<li>box_open()</li>
				<li>box_close()</li>
				<li>app_btn()</li>
			</ul>
			<?php echo app_btn('github', 'CI Bootstrap', CI_BOOTSTRAP_REPO); ?>
		<?php echo box_close('Box footer here'); ?>
	</div>

	<div class="col-md-4">
		<?php echo info_box('yellow', $count['users'], 'Users', 'users', 'user'); ?>
	</div>

	<div class="col-md-4">
		<?php echo info_box('aqua', $count['blog_posts'], 'Blog Posts', 'pencil', 'blog/post'); ?>
	</div>

>>>>>>> Merge remote-tracking branch 'refs/remotes/waifung0207/master'
</div>
