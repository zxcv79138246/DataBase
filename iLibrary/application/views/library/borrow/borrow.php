<div class="container">
	<div class="row form-group">
		<div class="col-md-3">
			<form class="form" role="search" action="<?php echo site_url('borrow/reservesearch') ?>" method="get" >
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
					<span class="input-group-btn">
					    <button class="btn btn-default" type="submit">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-offset-8 col-md-1">
			<a href="#" data-url="<?php echo site_url('usermanage/create') ?>" class="btn btn-primary edit-btn" data-toggle="modal" data-target=".edit-modal">還書</a>
		</div>
	</div>
	<div class="row table-responsive">
		<table class="table table-hover">
			<tr>
				<th>ISBN</th>
				<th>C_ID</th>
				<th>書名</th>
				<th>SSN</th>
				<th>姓名</th>
				<th>預約日期</th>
				<th>借書</th>
				<th>取消預約</th>
			<?php if ($reserves!=NULL): ?>
				<?php foreach ($reserves as $key => $reserve): ?>
				<tr>
					<td><?php ?></td>
					<td><?php ?></td>
					<td><?php ?></td>
					<td><?php ?></td>
					<td><?php ?></td>
					<td><?php ?></td>
					<td><a href="#" data-url="<?php ?>" class="btn btn-info btn-xs edit-btn" data-toggle="modal" data-target=".edit-modal">Edit</a></td>
					<td><a href="<?php ?>" class="btn btn-danger btn-xs">Remove</a></td>			
				</tr>
				<?php endforeach ?>
			<?php endif ?>
		</table>
	</div>
</div>