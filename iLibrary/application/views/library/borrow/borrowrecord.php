<div class="container">
	<div class="row form-group">
		<div class="col-md-3">
			<form class="form" role="search" action="<?php echo site_url(['returnbook/search',1]) ?>" method="get" >
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $condition ?>">
					<span class="input-group-btn">
					    <button class="btn btn-default" type="submit">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-2 col-md-offset-2">
			<h3> 借書記錄 </h3>
		</div>
	</div>
	<div class="row table-responsive">
		<table class="table table-hover">
			<tr>
				<th>ISBN</th>
				<th>C_ID</th>
				<th>書名</th>
				<th>封面</th>
				<th>借書日期</th>
				<th>還書日期</th>
			<?php if ($borrows!=NULL): ?>
				<?php foreach ($borrows as $key => $borrow): ?>
					<tr>
						<td><?php echo $borrow->isbn ?></td>
						<td><?php echo $borrow->c_id ?></td>
						<td><?php echo $borrow->bookName ?></td>
						<td><img class="book-image" src="<?php echo $borrow->cover ?>"></td>
						<td><?php echo $borrow->loan_date ?></td>
						<td><?php echo ($borrow->return_date!=NULL)? $borrow->return_date : '尚未歸還' ?></td>

					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</table>
	</div>
</div>