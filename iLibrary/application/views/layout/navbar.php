<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand iLibrary_icon" href="<?php echo site_url('/index') ?>">
				<span class="glyphicon glyphicon-book"></span> iLibary
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav subsystem">
				<li id ="book_sub" style="<?php echo ($this->session->userdata('priority')<2)? : 'display:none'  ?>"><a href="<?php echo site_url('/index') ?>">圖書庫</a></li>
				<li id ="reserve_sub" style="<?php echo ($this->session->userdata('priority')<2 && ($this->session->userdata('priority') != null))? : 'display:none'  ?>"><a href="<?php echo site_url('/borrow/reserveRecord') ?>">預約追蹤</a></li>
				<li id ="borrowRecord_sub" style="<?php echo ($this->session->userdata('priority')<2 && ($this->session->userdata('priority') != null))? : 'display:none'  ?>"><a href="<?php echo site_url('/returnbook/borrowRecord') ?>">借書紀錄</a></li>
				<li id ="member_sub" style="<?php echo ($this->session->userdata('priority')!=2)? 'display:none' : '' ?>"><a href="<?php echo site_url('/usermanage') ?>">會員管理</a></li>
				<li id ="bookmanage_sub" style="<?php echo ($this->session->userdata('priority')!=1)? 'display:none' : '' ?>"><a href="<?php echo site_url('/bookmanage') ?>">書籍管理</a></li>
				<li id ="borrowReturn_sub" style="<?php echo ($this->session->userdata('priority')!=1)? 'display:none' : '' ?>"><a href="<?php echo site_url('/borrow') ?>">借/還書管理</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->ssn): ?>
					<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
          					<?php echo $this->session->userdata('name') ?> <span class="caret"></span>
          				</a>
          				<ul class="dropdown-menu">
          					<li><a href="#" data-toggle="modal" data-target=".change-modal">變更密碼</a></li>
            				<li><a href="<?php echo site_url('login/logout') ?>">logout</a></li>
          				</ul>
        			</li>
				<?php else : ?>
					<li><a href="#" data-toggle="modal" data-target=".login-modal">Login</a></li>
				<?php endif ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<!-- 登入 -->
<div class="modal login-modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
	    <div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="model-title">Login</h4>
		    </div>
		    <form action="<?php echo site_url('login/login') ?>" method="POST">
      			<div class="modal-body" id="modal-login-body">
        			<div class="input-group form-group">
		            	<span class="input-group-addon">帳號</span>
		            	<input type="text" class="form-control" name = 'e-mail'>
		        	</div>
		        	<div class="input-group form-group">
		            	<span class="input-group-addon" name = 'password'>密碼</span>
		            	<input type="password" class="form-control"  name = 'password'>
		        	</div>
      			</div>
      			<div class="modal-footer">
		        	<button type="submit" class="btn btn-primary">登入</button>
		    	</div>
		    </form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- 改password -->
<div class="modal change-modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
	    <div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="model-title">Change Password</h4>
		    </div>
		    <form action="<?php echo site_url('login/changePS') ?>" method="POST">
      			<div class="modal-body" id="modal-login-body">
        			<div class="input-group form-group">
		            	<span class="input-group-addon">原密碼</span>
		            	<input type="password" class="form-control" name = 'password'>
		        	</div>
		        	<div class="input-group form-group">
		            	<span class="input-group-addon" name = 'password'>修改後密碼</span>
		            	<input type="password" class="form-control"  name = 'newpassword'>
		        	</div>
		        	<div class="input-group form-group">
		            	<span class="input-group-addon" name = 'password'>再輸入一次</span>
		            	<input type="password" class="form-control"  name = 'onemore'>
		        	</div>
      			</div>
      			<div class="modal-footer">
		        	<button type="submit" class="btn btn-primary">修改</button>
		    	</div>
		    </form>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	
	var index = localStorage.getItem("library");	//library index
	
	if(window.location.pathname == '/iLibrary/index.php/index' || window.location.pathname == '/iLibrary/');
	{
		localStorage.setItem("library", "0");
	}

	if(window.location.pathname == '/iLibrary/index.php/usermanage')
	{
		localStorage.setItem("library", "3");
	}

	$('.iLibrary_icon').click(function(event) {
		localStorage.setItem("library", "0");
	});

	$('#book_sub').click(function(event) {		
		localStorage.setItem("library", "0");
	});

	$('#reserve_sub').click(function(event) {
		localStorage.setItem("library", "1");
	});

	$('#borrowRecord_sub').click(function(event) {
		localStorage.setItem("library", "2");
	});

	$('#member_sub').click(function(event) {
		localStorage.setItem("library", "3");
	});

	$('#bookmanage_sub').click(function(event) {
		localStorage.setItem("library", "4");
	});

	$('#borrowReturn_sub').click(function(event) {
		localStorage.setItem("library", "5");
	});
	
	if (index != -1)
	{
		$('.subsystem > li').eq(index).addClass('active');
	}else {
		$('.subsystem > li').removeClass('active');
	}

</script>