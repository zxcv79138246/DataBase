<form class="form-horizontal" role="form" action="<?php echo site_url('bookmanage/storeOtherData') ?>" method="POST">
	<div class="form-group">
		<label class="col-md-3 control-label">分類</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="category">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">作者</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="author">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">出版社</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="publisher">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3 control-label">出版社地址</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="publisherAddress">
		</div>
	</div>	
	<button type="submit" class="btn btn-primary col-md-offset-10">NEW</button>
</form>