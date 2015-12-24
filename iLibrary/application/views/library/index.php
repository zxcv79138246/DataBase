<div class="jumbotron title-image title-page">
  <div class="container">
    <h1><span class="glyphicon glyphicon-book"></span> iLibrary</h1>
  	<p>首頁</p>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<form class="form" role="search" id="search-form">
				<div class="input-group">
					<input type="text" class="form-control search" placeholder="Search">
					<span class="input-group-btn">
					    <button class="btn btn-default search-button" type="submit">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-10 col-md-offset-2">
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
			<table class="table">
				<tr>
					<th>Book List</th>
				</tr>
			</table>
			<div class="book-back row">
				<?php foreach ($books as $key => $book): ?>
					<div class="col-md-2">
						<a class ="book-href" href=""><img class="img-thumbnail book-image" src="<?php echo $book->cover ?>" alt="<?php echo $book->name ?>"></a>
						<div class="book-name"><h5 class="text-center"><?php echo $book->name ?></h5></div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo asset_url('js/indexBookPage.js') ?>"></script>
<script> var bookCount = <?php echo $bookCount ?> </script>
