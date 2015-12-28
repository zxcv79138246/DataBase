<form class="form-horizontal" role="form" action="<?php echo site_url(['usermanage/store']) ?>" method="POST">
	<div class="form-group">
		<label class="col-md-2 control-label">ISBN</label>
		<div class="col-md-3">
			<input type="text" class="form-control" name="isbn">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">名子</label>
		<div class="col-md-3">
			<input type="text" class="form-control" name="name">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">分類</label>
		<div class="col-md-3">
			<select class="form-control" name="priority">
				<option value="0" checkde>預設雜誌(0)</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">作者</label>
		<div class="col-md-3">
			<select class="form-control" name="priority">
				<option value="135478" checkde>預設吉澤明步(135478)</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">出版社</label>
		<div class="col-md-3">
			<select class="form-control" name="priority">
				<option value="8" checkde>預設東立(8)</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">出版日期</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="phone">
		</div>
	</div>
	<button type="submit" class="btn btn-primary col-md-offset-10">NEW</button>
</form>