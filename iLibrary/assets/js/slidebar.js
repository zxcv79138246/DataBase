$(function() {
	var $this = $(".navbar-nav li");
	$this.click(function(event){
		$this.each(function(index, el) {
			$(el).removeClass('active');
		});
		$(this).addClass("active");
	});
});
