<nav class="navbar navbar-inverse navbar-fixed-top" >
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo site_url('index/index') ?>" >
				<span class="glyphicon glyphicon-book"></span> iLibary
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav">
				<li <?php if ($this->uri->segment(1, 0) == 'index') echo 'class="active"' ?>><a href="<?php echo site_url('/index') ?>">圖書庫</a></li>
				<li><a href="#">預約追蹤</a></li>
				<li><a href="#">借書紀錄</a></li>
				<li <?php if ($this->uri->segment(1, 0) == 'usermanage') echo 'class="active"' ?>><a href="<?php echo site_url('/usermanage') ?>">會員管理</a></li>
				<li><a href="#">書籍管理</a></li>
				<li><a href="#">借還書管理</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->ssn): ?>
					<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
          					<?php echo $this->session->userdata('name') ?> <span class="caret"></span>
          				</a>
          				<ul class="dropdown-menu">
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
<div style="padding:25px;"></div>
<div class="modal login-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm">
	    <div class="modal-content">
		    <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="model-title">Login</h4>
		    </div>
		    <form action="<?php echo site_url('login/login') ?>" method="POST">
      			<div class="modal-body" id="modal-login-body">
        			<div class="input-group">
		            	<span class="input-group-addon">帳號</span>
		            	<input type="text" class="form-control" name = 'e-mail'>
		        	</div>
		        	<div class="input-group">
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
