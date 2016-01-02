<div class="container">
	<div class="row form-group">
		<div class="col-md-2 col-md-offset-5">
			<h3> 預約追蹤 </h3>
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
				<th>書籍狀態</th>
				<th>取消預約</th>
			<?php if ($reserves!=NULL): ?>
				<?php foreach ($reserves as $key => $reserve): ?>
					<tr>
						<td><?php echo $reserve->isbn ?></td>
						<td><?php echo $reserve->reserveC_id ?></td>
						<td><?php echo $reserve->bookName ?></td>
						<td><?php echo $reserve->reserveSSN ?></td>
						<td><?php echo $reserve->userName ?></td>
						<td><?php echo $reserve->date ?></td>
						<td class="bookstate"><?php echo (($reserve->return_date != NULL && $reserve->loan_date != null) || $reserve->loan_date == NULL) ? '可借書'  : '書籍尚未歸還' ?></td>
						<td><a href="<?php echo site_url(['borrow/destory',$reserve->reserveC_id,0, 1]) ?>" class="btn btn-danger btn-xs">取消預約</a></td>			
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</table>
	</div>
</div>