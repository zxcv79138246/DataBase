<?php if ($this->session->flashdata('login_fail_message')): ?>
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo $this->session->flashdata('login_fail_message') ?>;
	</div>
<?php endif ?>