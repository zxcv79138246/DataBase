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
		<div class="col-md-offset-6 col-md-1">
			<a href="#" data-url="<?php echo site_url('bookmanage/createdata') ?>" class="btn btn-primary edit-btn" data-toggle="modal" data-target=".edit-modal">新增其他資料</a>
		</div>
		<div class="col-md-offset-1 col-md-1">
			<a href="#" data-url="<?php echo site_url('bookmanage/create') ?>" class="btn btn-primary edit-btn" data-toggle="modal" data-target=".edit-modal">＋NEW</a>
		</div>
	</div>
	<div class="row table-responsive">
		<table class="table table-hover">
			<tr>
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
				<td><?php echo $book->isbn ?></td>
				<td class="bookdata-name"><?php echo $book->name ?></td>
				<td class="bookdata"><?php echo $book->category ?></td>
				<td class="bookdata"><?php echo $book->authorName ?></td>
				<td class="bookdata"><?php echo $book->publisherName ?></td>
				<td><?php echo $book->publish_date ?></td>
				<td><img class="img-thumbnail book-image" src="<?php echo $book->cover ?>" alt="<?php echo $book->name ?>"></td>
				<td><a href="#" data-url="<?php echo site_url(['bookmanage/edit', $book->isbn]) ?>" class="btn btn-info btn-xs edit-btn" data-toggle="modal" data-target=".edit-modal">Edit</a></td>
				<td><a href="<?php echo site_url(['bookmanage/destory', $book->isbn]) ?>" class="btn btn-danger btn-xs">Remove</a></td>			
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
      			<h3>書籍資料</h3>
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
					$('#modal-body').html(response);
					var isbn = $(response).find('#isbn').val();    //編輯copyNum
					console.log(isbn);
	                // binding add copy delete copy event on edit-btn    
	                $('.copy-add').on('click', function() {
	                    $.ajax({
	                            url: '/iLibrary/index.php/bookmanage/addCopy/' + isbn,
	                            type: 'POST',
	                            dataType: 'JSON',
	                            data: {
	                                isbn: isbn
	                            },
	                        })
	                        .success(function(response) {
	                            $.smkAlert({
	                                text: response.message,
	                                type: response.status,
	                                position: 'top-center'
	                            });
	                            $('.copyNum').text(parseInt($('.copyNum').text()) + 1);
	                        });

	                })

	                $('.copy-delete').on('click', function() {
	                    $.ajax({
	                            url: '/iLibrary/index.php/bookmanage/deleteCopy/' + isbn,
	                            type: 'POST',
	                            dataType: 'JSON',
	                            data: {
	                                isbn: isbn
	                            },
	                        })
	                        .success(function(response) {
	                            $.smkAlert({
	                                text: response.message,
	                                type: response.status,
	                                position: 'top-center'
	                            });
	                            $('.copyNum').text(parseInt($('.copyNum').text()) - 1);
	                        });

	                })
				}
			})
		});
	});
</script>