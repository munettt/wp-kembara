$(window).on('scroll', function(event) {
	var scrollValue = $(window).scrollTop();
	if (scrollValue > 300) {
		 $('.navbar').addClass('fixed');
	} 
	else
	{
		$('.navbar').removeClass('fixed');
	}
});

$('.logo').hover(function()
{
	$('#site-header').addClass('active');
},function()
{
	$('#site-header').removeClass('active');
});