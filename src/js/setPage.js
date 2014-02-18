function setPage(s){
	$('.navbar-default .active').removeClass('active');
	$('[href="'+s+'"]').addClass('active');
}