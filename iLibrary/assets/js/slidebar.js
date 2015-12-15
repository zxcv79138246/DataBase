$(function() {
	var $this = $(".navbar-nav li");
	console.log($this);
	$this.click(function(event){
		console.log("1");
		$this.each(function(index, el) {
			$(el).removeClass('active');
		});
		$(this).addClass("active");
	});
});
