<div class="jumbotron title-image title-page">
  <div class="container">
    <h1><span class="glyphicon glyphicon-book"></span> iLibrary</h1>
  	<p>首頁</p>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-9">
			<form class="form" role="search" id="search-form">
				<div class="input-group">
					<input type="text" class="form-control search" placeholder="Search">
					<span class="input-group-btn">
					    <button class="btn btn-default search-button" type="submit">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-12">
			<nav class="text-center">
			  <ul class="pagination bookPage">
			    <li data-type="-1">
			      <a aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class=" active number"><a>1</a></li>
			    <li class="number"><a>2</a></li>
			    <li class="number"><a>3</a></li>
			    <li class="number"><a>4</a></li>
			    <li class="number"><a>5</a></li>
			    <li data-type="+1">
			      <a aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
			<h3 class="page-header">Book List</h3>
			<div class="book-back">
				<div class="row">
				<?php foreach ($books as $key => $book): ?>
					<div class="col-md-2">
						<a class ="book-href book-btn" href="#" data-url="<?php echo site_url(['index/bookdata', $book->isbn]) ?>" data-toggle="modal" data-target=".book-modal">
							<img class="img-thumbnail book-image" src="<?php echo $book->cover ?>" alt="<?php echo $book->name ?>">
						</a>
						<div class="book-name text-center"><h5><?php echo $book->name ?></h5></div>
					</div>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade book-modal" tabindex="-1" role="dialog">  <!-- 書本浮筐  -->
  	<div class="modal-dialog">
    	<div class="modal-content">
         	<div class="modal-header">
           		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      			<h3>書本資料</h3>
      		</div>
      		<div class="modal-body" id="modal-body">
        		<p></p>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript" src="<?php echo asset_url('js/indexBookPage.js') ?>"></script>
<script> var bookCount = <?php echo $bookCount ?> </script>

