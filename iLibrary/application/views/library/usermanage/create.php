<form class="form-horizontal" role="form" action="<?php echo site_url(['usermanage/store']) ?>" method="POST">
	<div class="form-group">
		<label class="col-md-2 control-label">SSN</label>
		<div class="col-md-3">
			<input type="text" class="form-control" name="ssn">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Sex</label>
		<div class="col-md-3">
			<label class="radio-inline">
				<input type="radio" name="sex" value="man">男
			</label>
			<label class="radio-inline">
				<input type="radio" name="sex" value="woman">女
			</label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Name</label>
		<div class="col-md-3">
			<input type="text" class="form-control" name="name">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Address</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="address">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Phone</label>
		<div class="col-md-4">
			<input type="text" class="form-control" name="phone">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" class="form-control" name="email">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Password</label>
		<div class="col-md-6">
			<input type="text" class="form-control" name="password">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-2 control-label">Priority</label>
		<div class="col-md-3">
			<select class="form-control" name="priority">
				<option value="0" checkde>讀者</option>
				<option value="1" >圖書館管理員</option>
				<option value="2" >系統管理員</option>
			</select>
		</div>
	</div>
	<button type="submit" class="btn btn-primary col-md-offset-10">NEW</button>
</form>