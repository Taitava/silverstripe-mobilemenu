
jQuery(function ($)
{
	//Toggle menu visibility
	$('a#mobile-menu-button').click(function ()
	{
		body = $('body');
		
		if (body.hasClass('mobile-menu-closed'))
		{
			//Mobile menu should be now opened
			body.removeClass('mobile-menu-closed').addClass('mobile-menu-open');
		}
		else
		{
			//Mobile menu should be now closed
			body.removeClass('mobile-menu-open').addClass('mobile-menu-closed');
		}
		
		return false; //Prevent browser from navigating to the link's URL
	});
	
	//Show/hide the menu button depending on viewport width
	var onResize = function()
	{
		body = $('body');
		if ($(window).width() < GLOBAL_MOBILE_MENU_BREAKPOINT)
		{
			//MOBILE
			body.removeClass('desktop-width').addClass('mobile-width');
		}
		else
		{
			//DESKTOP
			body.removeClass('mobile-width').addClass('desktop-width');
		}
	}
	$(window).resize(onResize).on('orientationchange', onResize);
	onResize(); //Trigger at startup
	
	
});