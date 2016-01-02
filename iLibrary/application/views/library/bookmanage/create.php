<form class="form-horizontal" role="form" action="<?php echo site_url(['bookmanage/store'])  ?>" method="POST">
<div class="row">
		<div class=" col-md-7">
			<div class="form-group">
				<label class="col-md-3 control-label">ISBN</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="isbn" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">書名</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="name" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">分類</label>
				<div class="col-md-8">
					<select class="form-control" name="category">
						<?php foreach ($categorys as $key => $category): ?>
							<option value = "<?php echo $category->id ?>"><?php echo $category->category ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">作者</label>
				<div class="col-md-8">
					<select class="form-control" name="author_id">
						<?php foreach ($authors as $key => $author): ?>
								<option value = "<?php echo $author->id ?>"><?php echo $author->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">出版社</label>
				<div class="col-md-8">
					<select class="form-control" name="publisher_id">
						<?php foreach ($publishers as $key => $publisher): ?>
								<option value = "<?php echo $publisher->id ?>"><?php echo $publisher->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">出版日期</label>
				<div class="col-md-8">
					<input type="date" class="form-control" name="publish_date" >
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<image class="edit-bookimg img-thumbnail" src="">
		</div>
	</div>
	<div class="row">
		<div class="form-group">
			<label class="col-md-2 control-label">封面</label>
			<div class="col-md-9">
				<input type="text" class="form-control cover_url" name="cover" >
			</div>
		</div>
	</div>

	<button type="submit" class="btn btn-primary col-md-offset-10">NEW</button>

</form>

<script>
	$(".cover_url").change(function(event) {
		$(".edit-bookimg").attr('src', $(this).val());
	});
</script>
