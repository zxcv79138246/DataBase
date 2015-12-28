<div class="container">
	<div class="row form-group">
		<div class="col-md-3">
			<form class="form" role="search" action="<?php echo site_url('bookmanage/search') ?>" method="get" >
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
					<span class="input-group-btn">
					    <button class="btn btn-default" type="submit">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-offset-8 col-md-1">
			<a href="#" data-url="<?php echo site_url('bookmanage/create') ?>" class="btn btn-primary edit-btn" data-toggle="modal" data-target=".edit-modal">＋NEW</a>
		</div>
	</div>
	<div class="row table-responsive">
		<table class="table table-hover">
			<tr>
				<th>Book_ID</th>
				<th>ISBN</th>
				<th>書名</th>
				<th>分類</th>
				<th>作者</th>
				<th>出版社</th>
				<th>出版日期</th>
				<th>Cover</th>
				<th>Edit</th>
				<th>Remove</th>
			<?php foreach ($books as $key => $book): ?>
			<tr>
				<td><?php echo $book->b_id ?></td>
				<td><?php echo $book->isbn ?></td>
				<td><?php echo $book->name ?></td>
				<td><?php echo $book->category ?></td>
				<td><?php echo $book->authorName ?></td>
				<td><?php echo $book->publisherName ?></td>
				<td><?php echo $book->publish_date ?></td>
				<td><img class="img-thumbnail book-image" src="<?php echo $book->cover ?>" alt="<?php echo $book->name ?>"></td>
				<td><a href="#" data-url="<?php echo site_url(['bookmanage/edit', $book->b_id]) ?>" class="btn btn-info btn-xs edit-btn" data-toggle="modal" data-target=".edit-modal">Edit</a></td>
				<td><a href="<?php echo site_url(['bookmanage/destory', $book->b_id]) ?>" class="btn btn-danger btn-xs">Remove</a></td>			
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

<div class="modal fade edit-modal" tabindex="-1" role="dialog">  <!-- 浮筐  -->
  	<div class="modal-dialog">
    	<div class="modal-content">
         	<div class="modal-header">
           		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      			<h3>會員資料</h3>
      		</div>
      		<div class="modal-body" id="modal-body">
        		<p></p>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(function (){       			//顯示edit, create 等視窗及內容
		$(".edit-btn").click(function(event) {
			$.ajax({
				url: $(this).data('url'),
				type: 'get',
				success:function (response){
					console.log(response);
					$('#modal-body').html(response);
				}
			})
		});
	});
</script>