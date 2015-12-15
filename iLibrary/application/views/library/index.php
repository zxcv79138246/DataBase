<?php if ($this->session->flashdata('login_fail_message')): ?>
	<div class="alert alert-danger alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<?php echo $this->session->flashdata('login_fail_message') ?>;
	</div>
<?php endif ?>
<div class="jumbotron title-image padding-bottom-30">
  <div class="container">
    <h1><span class="glyphicon glyphicon-book"></span> iLibrary</h1>
  	<p>首頁</p>
  </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<form class="form" role="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search">
					<span class="input-group-btn">
					    <button class="btn btn-default" type="button">Search</button>
					</span>
				</div>
			</form>
		</div>
		<div class="col-md-9">
			<nav class="text-center">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
			<table class="table">
				<tr>
					<th>Book List</th>
				</tr>
				<tr>
					<div>
						<table class="book-style">
							<tr>
								<td width="10%" valign="top" rowspan="8">
									<img class="img-thumbnail book-image" src="http://ext.pimg.tw/b318ccc/1424317423-466273065.png" alt="...">
								</td>
								<td width="90%" valign="top">
									<span>書名：</span>
								</td>
							</tr>
						</table>
					</div>
				</tr>
			</table>
		</div>
	</div>
</div>
