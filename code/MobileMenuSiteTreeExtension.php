<?php

class MobileMenuSiteTreeExtension extends Extension
{
	public function contentcontrollerInit()
	{
		Requirements::javascript('framework/thirdparty/jquery/jquery.min.js');
		Requirements::javascript('mobilemenu/js/MobileMenu.js');
		Requirements::css('mobilemenu/css/MobileMenu.css');
		Requirements::customScript('var GLOBAL_MOBILE_MENU_BREAKPOINT = '.MobileMenu::config()->get('breakpoint').';');
	}
}