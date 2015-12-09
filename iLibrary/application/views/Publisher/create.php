<?php if (validation_errors()): ?>
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo validation_errors() ?>
	</div>
<?php endif ?>
<?php echo form_open('post/publisher_store') ?>
		<div class="form-group">
			<label for="">Name</label>
			<input type="text" class="form-control" name="name" placeholder="Publisher Name" value="<?php echo  set_value('name') ?>">
		</div>
		<div class="form-group">
			<label for="">Address</label>
			<input type="text" class="form-control" name="address" placeholder="Publisher Address" value="<?php echo  set_value('address') ?>">
		</div>
		<button type="submit" class="btn btn-primary">Publish</button>
<?php echo form_close() ?>
