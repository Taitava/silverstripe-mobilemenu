<?php

// Support SilverStripe versions lower than 3.7:
if (!class_exists('SS_Object')) class_alias('Object', 'SS_Object');

/**
 * Class MobileMenu
 *
 * This class is used just for configuration.
 *
 */
class MobileMenu extends SS_Object // If SilverStripe version in lower than 3.7, SS_Object will be an alias for Object class. In SS 3.7 SS_Object is a real class.
{
	/**
	 * If the viewport is narrower than this value (in pixels), show the mobile menu button. Otherwise hide it.
	 *
	 * @conf int
	 */
	private static $breakpoint = 768;
}
