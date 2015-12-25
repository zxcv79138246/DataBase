<form class="form-horizontal" role="form" action="" method="POST">
	<div class="row">
		<div class=" col-md-4">
			<img class="img-thumbnail bookdata-image " src="<?php echo $book->cover ?>" alt="<?php echo $book->name ?>">
		</div>
		<div class="col-md-7">
			<div class="form-group">
				<label class="col-md-4 control-label">ISBN：</label>
				<div>
					<h5><?php echo $book->isbn ?></h5>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">書名：</label>
				<div>
					<h5><?php echo $book->name ?></h5>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">作者：</label>
				<div>
					<h5><?php echo $book->authorName ?></h5>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">出版社：</label>
				<div>
					<h5><?php echo $book->publisherName ?></h5>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label">出版日期：</label>
				<div>
					<h5><?php echo $book->publish_date ?></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class ="col-md-12">
			<div class="col-md-4">
				<label class="">書本數： <?php echo 0; ?> </label>
			</div>
			<div class="col-md-4">
				<label class="">被預約數：  <?php echo 0; ?> </label>
			</div>
			<div class="col-md-4">
				<label class="">被借閱數：  <?php echo 0; ?> </label>
			</div>
		</div>
	</div>
	<div class ="row">
		<div class=" col-md-offset-10">
			<button type="submit" class="btn btn-primary">預約</button>
		<div>
	</div>
</form>