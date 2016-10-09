# silverstripe-mobilemenu

This is a small module that is designed to give you an easy way to:
 - Add a simple mobile menu button when the viewport is narrow (= mobile view)
 - Integrate mobile/desktop triggers to your existing desktop/mobile menu layout by using CSS classes
 - Configure a simple breakpoint in pixels that toggles your layout (or just the menu) between desktop and mobile view modes

The module uses JavaScript to determine the mobile/desktop mode, which perhaps is not the cleanest way to do it, but is quite simple. Perhaps the JavaScript requirement could be made optional at some point by creating another method to build the mobile/desktop menu with pure CSS. At least for now, jQuery is required, but apart from that no external libraries are used.
 
## Features

**This isn't an "out of the box" solution**, but instead it it's designed so that it does not drive you to use some pre-designed menu layout that makes a big learning curve to get to know how to modify the menu to suit your website's layout.

### Menu button

This module offers you a simple mobile menu button that looks like this: ![button icon](https://github.com/Taitava/silverstripe-mobilemenu/blob/master/images/MobileMenuButton.png?raw=true) . It has three bold black lines with a transparent background. If it doesn't look decent to your eye, you can always change it - athough there is no currently a simple setting for that, so just use your CSS files to override the `background-image` of `a#mobile-menu-button`. Also remember to change the element's width and height accordingly.

**To make the menu button appear**, put `<% include MobileMenuButton %>` somewhere inside your SilverStripe template, or alternatively just create a `<a id="mobile-menu-button"></a>` HTML element and customise it as you want.

### Menu element

 **There is no actual menu template in this module.** Use the following CSS selectors inside your `layout.css` or some other stylesheet to detect different modes:
   
 - `body.mobile-width your-element-selector-here`: applies when the viewport is narrower than to currently defined breakpoint (768px by default).
 
 - `body.desktop-width your-element-selector-here`: applies when the viewport is wider than to currently defined breakpoint (768px by default).
 
 - `body.mobile-menu-open your-element-selector-here`: applies when the mobile menu button has been clicked and the mobile menu should be visible (usually on top of all other elements on the page).
 
 - `body.mobile-menu-closed your-element-selector-here`: applies when the mobile menu button has not been clicked (or has been clicked again) and the mobile menu should be hidden.
 
If you need an example for a menu that toggles between a desktop and mobile view mode, here is a simple start for your:
 
HTML:
```HTML
<a id="mobile-menu-button"></a>
<nav>
	<% loop $Level(1) %>
		<a href="$Link" title="$Title.XML">$MenuTitle.XML</a>
	<% end_loop %>
</nav>
```
 
CSS:
```CSS
nav
{
	background-color: #e1e1e1;
}

body.mobile-width nav
{
	display: none; /* Hide the menu by default in mobile mode */
}
 
body.mobile-width.mobile-menu-open nav
{
	/* When the mobile menu is opened, position it across the whole viewport */
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	height: 100vh; /* Make the navigation view as tall as the viewport is (not as tall as the page is) */
	z-index: 1; /* Put the menu above everything else (except the mobile menu button, see below). */
}
 
body.mobile-width.mobile-menu-open nav a
{
	display: block;
}

a#mobile-menu-button
{
	z-index: 2; /* Display the button always above the mobile menu even if it's open */
	float: right; /* Not needed, but better avoids overlapping with the content of the nav element. Replace this with your own way to position the button in the right place on your page. */
}
```

This example has not been tested. If you find bugs in it, please let me know and I will try to solve them. 
 
## The breakpoint between mobile and desktop views 

 The default breakpoint is 768 pixels. It doesn't affect your layout in anyway, so you can define a breakpoint just for your mobile menu if you wish, or alternatively take it to a larger use in your layout so you can perhaps leave out media queries (at least if your layout design is simple and a single breakpoint is enough for you).
 
**To change the breakpoint**, create a file named `mysite/_config/mobilemenu.yml` and put this inside it:
```
MobileMenu:
  breakpoint: your-custom-value-in-pixels #Default: 768
```

## The future

No plans yet :). Any ideas? :) PR's, Issues and feedback are all welcome!

## Author

You can contact me via GitHub, my username is [Taitava](https://github.com/Taitava). The module uses the MIT license.