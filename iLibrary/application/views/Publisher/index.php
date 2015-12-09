<?php if ($this->session->flashdata('message')): ?>
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo $this->session->flashdata('message') ?>
	</div>
<?php endif ?>
<table class="table">
	<tr>
		<th>Publisher</th>
		<th>Name</th>
		<th>Address</th>
		
	</tr>
	<?php foreach ($publisher as $key => $publisher): ?>
	<tr>
		<td><?php echo $key+1 ?></td>
		<td><?php echo $publisher->name ?></td>
		<td><?php echo $publisher->address ?></td>
		
	</tr>
	<?php endforeach ?>
</table>
<div class="modal fade edit-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body" id="modal-body">
        <p></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
