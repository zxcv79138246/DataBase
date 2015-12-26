<div class="row form-group">
	<div class=" col-md-4">
		<img class="img-thumbnail bookdata-image " src="<?php echo $book->cover ?>" alt="<?php echo $book->name ?>">
	</div>
	<div class="col-md-7">
		<div class="form-group">
			<label class="col-md-4 control-label">ISBN：</label>
			<div>
				<strong id="isbn"><?php echo $book->isbn ?></strong>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">書名：</label>
			<div>
				<strong><?php echo $book->name ?></strong>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">作者：</label>
			<div>
				<strong><?php echo $book->authorName ?></strong>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">出版社：</label>
			<div>
				<strong><?php echo $book->publisherName ?></strong>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label">出版日期：</label>
			<div>
				<strong><?php echo $book->publish_date ?></strong>
			</div>
		</div>
	</div>
</div>
<div class="row form-group">
	<div class ="col-md-12">
		<div class="col-md-4">
			<label class="control-label">書本數： <?php echo $copyNum[0]->copyNum; ?> </label>
		</div>
		<div class="col-md-4">
			<label class="control-label">被預約數：  <?php echo $reserveNum[0]->reserveNum; ?> </label>
		</div>
		<div class="col-md-4">
			<label class="control-label">被借閱數：  <?php echo $hasBorrowNum[0]->hasBorrowNum; ?> </label>
		</div>
	</div>
</div>
<div class ="row form-group">
	<div class=" col-md-offset-10">
		<button type="submit" class="btn btn-primary reserve-btn">預約</button>
	<div>
</div>