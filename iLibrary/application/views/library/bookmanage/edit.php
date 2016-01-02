<form class="form-horizontal" role="form" action="<?php echo site_url(['bookmanage/update',$book->isbn])  ?>" method="POST">
	<div class="row">
		<div class=" col-md-7">
			<div class="form-group">
				<label class="col-md-3 control-label">ISBN</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo (validation_errors()) ? set_value('isbn') : $book->isbn; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">書名</label>
				<div class="col-md-8">
					<input type="text" class="form-control" name="name" value="<?php echo (validation_errors()) ? set_value('name') : $book->name; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">分類</label>
				<div class="col-md-8">
					<select class="form-control" name="category">
						<?php foreach ($categorys as $key => $category): ?>
							<option value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">作者</label>
				<div class="col-md-8">
					<select class="form-control" name="author_id">
						<?php foreach ($authors as $key => $author): ?>
								<option value="<?php echo $author->id ?>"><?php echo $author->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">出版社</label>
				<div class="col-md-8">
					<select class="form-control" name="publisher_id">
						<?php foreach ($publishers as $key => $publisher): ?>
								<option value="<?php echo $publisher->id ?>"><?php echo $publisher->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">出版日期</label>
				<div class="col-md-8">
					<input type="type" class="form-control" name="publish_date" value="<?php echo (validation_errors()) ? set_value('publish_date') : $book->publish_date; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3 control-label">書本數</label>
				<div class="form-group control-label">
					<div class="col-md-1">
						<p class="copyNum"><?php echo $copyNum[0]->copyNum ?></p>
					</div>
					<a class="btn btn-info btn-xs col-md-1 copy-add">+</a>
					<a class="btn btn-danger btn-xs col-md-1 copy-delete">-</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<image class="edit-bookimg img-thumbnail" src="<?php echo $book->cover ?>">
		</div>
	</div>
	<div class="row">
		<div class="form-group">
			<label class="col-md-2 control-label">封面</label>
			<div class="col-md-9">
				<input type="text" class="form-control cover_url" name="cover" value="<?php echo (validation_errors()) ? set_value('cover') : $book->cover; ?>">
			</div>
		</div>
	</div>

	<button type="submit" class="btn btn-primary col-md-offset-10">修改</button>

</form>

<script>
	$("[name='category'] > [value='<?php echo $book->category ?>']")[0].selected = true;
	$("[name='author_id'] > [value='<?php echo $book->author_id ?>']")[0].selected = true;
	$("[name='publisher_id'] > [value='<?php echo $book->publisher_id ?>']")[0].selected = true;

	$(".cover_url").change(function(event) {
		$(".edit-bookimg").attr('src', $(this).val());
	});
</script>