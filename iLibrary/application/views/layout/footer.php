			<div class="text-center">
				<hr></hr>
				<p>2015 power by iLibrary</p>
			</div>
		</div>
	</body>
</html>

<script type="text/javascript">   
	<?php if($this->session->flashdata('message')): ?> // 浮筐處理
	$(function () {
		$.smkAlert({
		    text: '<?php echo $this->session->flashdata("message") ?>',
		    type: '<?php echo $this->session->flashdata("type") ?>',
		    position: 'top-center'
		});
	})
	<?php endif ?>

	$(function(){			//scrollup
  		$.scrollUp({
  			scrollText: '^',
  			scrollDistance: 100,
  			scrollSpeed: 300,  
  		});

	});

</script>

