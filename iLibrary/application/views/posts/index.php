
<?php if ($this->session->flashdata('message')): ?>
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo $this->session->flashdata('message') ?>
	</div>
<?php endif ?>

<div class="row">
	<div class="col-md-3">
		<form class="form" role="search">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search">
				<span class="input-group-btn">
				    <button class="btn btn-default" type="button">Search</button>
				</span>
			</div>
		</form>
	</div>
	<div class="col-md-9">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Title1</th>
				<th>Publish at</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>
			<?php foreach ($posts as $key => $post): ?>
			<tr>
				<td><?php echo $key + 1 ?></td>
				<td><a href="<?php echo site_url(['post/show', $post->id]) ?>"><?php echo $post->title ?></a></td>
				<td><?php echo $post->published_at ?></td>
				<td><a href="#" data-url="<?php echo site_url(['post/edit', $post->id]) ?>" class="btn btn-info btn-xs edit-btn"  data-toggle="modal" data-target=".edit-modal">Edit</a></td>
				<td><a href="<?php echo site_url(['post/destory', $post->id]) ?>" class="btn btn-danger btn-xs">Remove</a></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
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
<script>
	$(document).ready(function() {
		$('.edit-btn').on('click', function() {
			$.ajax({
				url: $(this).data('url'),
				type: 'get',
				success: function (response) {
					$('#modal-body').html(response);
				}
			})
		})
	})
</script>