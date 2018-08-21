=== Editor WordPress Theme ===
Contributors: array, okaythemes
Donate link: https://array.is/
Tags: light, white, gray, two-columns, left-sidebar, responsive-layout, custom-background, custom-menu, editor-style, featured-images, infinite-scroll, post-formats, rtl-language-support, site-logo, sticky-post, threaded-comments, translation-ready, blog, photoblogging, clean, modern, featured-content-with-pages
Requires at least: 3.8
Tested up to: 3.9.1
Stable tag: 1.0.5-wpcom
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Editor puts bold and beautiful publishing right at your fingertips with comfortable, legible typography, large featured images and a featured content area.

== Description ==

Editor puts bold and beautiful publishing right at your fingertips with comfortable, legible typography, large featured images and a featured content area.

== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= How can I use the Featured Posts area?

To take advantage of the featured post area:

1. Create a post with a featured image that's at least 600px wide (image is optional).
2. Navigate to Appearance -> Customize.
3. In the section labeled "Featured Content," enter the name of a tag.
4. Click the "Save" button.

= Where can I add widgets? =

Editor supports one widget area. It's located in the sidebar as a hidden menu. You can view your widgets by clicking the folder icon in Editor’s sidebar.

= Does Editor use featured images? =

Featured images in Editor are full width up to 1200px. These show on both the blog page and single post. They are designed to show at the top of posts.

= Where is my custom menu? =

You can activate a custom menu under Appearance -> Menus, which will be displayed in the sidebar beneath the menu icon.

= Does Editor support Post Formats? =

Editor supports Aside, Image, Video, Quote, and Link post formats. Each is denoted with a unique symbol, and contains a link to the archive of that particular post format.

= Does Editor include a Social Links Menu? =

Yes! The Social Links Menu supports these social networks:

WordPress
Facebook
Twitter
Dribbble
Google Plus
Pinterest
GitHub
Tumblr
YouTube
Flickr
Vimeo
Instagram
CodePen
LinkedIn
WordPress RSS Feed
Email address link

= Does Editor include extra post styles? =

Yes! Editor comes with a few custom element styles, which are used to easily add extra styling to your WordPress content.

** Pull Quotes **

Pull quotes are similar to block quotes, but are reserved for less text. See Editor’s Style Guide to see the suggested usage. To use pull quotes you can add a class of pull-left or pull-right to your content. See an example below.

<span class="pull-right">This text will be pulled right.</span>

** Text Highlight **

Text highlight simply adds a yellow background to your text, useful for in-paragraph emphasis. To use the highlight style, you can add a class of highlight to your content. See an example below.

<span class="highlight">This text will be highlighted.</span>


= Quick Specs =

1. The main column width is 730px.
2. The Primary Sidebar is 20% percent of the width of the main content area.
3. Featured images work best at 1200px.

= License Info =
Font Awesome - ​http://fontawesome.io
License: SIL OFL 1.1, CSS: MIT License - http://fontawesome.io/license
Copyright: @davegandy

== Changelog ==

= 8 June 2017 =
* Update widget styles, to preserve regular list styles in the text widget, and to prevent too-long text from flowing outside of the widget area.

= 7 June 2017 =
* Update JavaScript that toggles hidden widget area, to make sure new video and audio widgets are displaying correctly when opened.

= 22 March 2017 =
* add Custom Colors annotations directly to the theme
* move fonts annotations directly into the theme

= 4 October 2016 =
* Add the new `fixed-menu` feature tag to the stylesheet.

= 16 June 2016 =
* Add a class of .widgets-hidden to the body tag when the sidebar is active; allows the widgets to be targeted by Direct Manipulation.

= 18 May 2016 =
* Add Headstart annotations.

= 12 May 2016 =
* Add new classic-menu tag.

= 22 April 2016 =
* Add featured-content-with-pages tag to style.css and readme.txt.

= 13 January 2016 =
* spell GitHub correctly.

= 22 October 2015 =
* Fix bug with gallery image links not respecting right widths

= 4 September 2015 =
* Update readme.txt to list recent changes
* Change CSS on `.wp-caption` to avoid margin conflicts.

= 20 August 2015 =
* Add text domain and/or remove domain path. (E-I)

= 31 July 2015 =
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 17 June 2015 =
* Remove CSS hack for Safari resize/scroll event; use a jQuery-based solution where we store the starting window width in a variable and compare it to the new window width before proceeding; this doesn't conflict with Infinite Scroll but still
* Temporary fix for infinite scroll on desktop screens; only apply CSS overflow hack for Safari resize trigger on small screens where the menu can't be accessed.

= 25 March 2015 =
* Fix collapsing mobile menu on scroll because of Webkit mobile browser bug firing a resize event on scroll.

= 10 March 2015 =
* Declare onResize function name more traditionally so it can be called from elsewhere in the file.

= 28 January 2015 =
* Trigger a resize event when opening the sidebar toggle to make sure things like the Gallery Widget are displayed properly.

= 18 December 2014 =
* Make tabs look like tabs visually.

= 6 November 2014 =
* Update site logo link class.
* Make social icons a minimum width and height for better appearance.
* Fix broken LinkedIn icon in social links menu.

= 4 November 2014 =
* Update readme.txt with latest changes for WordPress.com release.

= 3 November 2014 =
* Remove unneeded language files and add updated .pot file.

= 2 November 2014 =
* Add Jetpack prefixing to Site Logo template tags.

= 31 October 2014 =
* Add social links menu.

= 11 August 2014 =
* Add line-height to Rate This areas so it looks better in theme.
* Clean up post editor styles, update theme tags and add extra details to readme.txt.

= 7 August 2014 =
* Clean up quote post format for better display with wordpress.com.
* Add support for additional post formats: aside, image, video and link.

= 6 August 2014 =
* Adjust breakpoints so sidebar doesn't appear so small at smaller screens.

= 4 August 2014 =
* Display the stat smiley and position it nicely.
* Fix decreasing avatar sizes on threaded comments.
* Handle site logo better at smaller screen sizes.

= 3 August 2014 =
* Add visual hierarchy to no custom menu fallback.
* Adjust post, page and comment navigation for better styles.

= 2 August 2014 =
* Hide quote icon for the Reblog feature.
* Add style for nested blockquotes to they look nested.
* Fix broken gallery column setting, refine caption styles and adjust left and right aligned media.

= 1 August 2014 =
* Fix hidden checkboxes and radio buttons, add bottom margin to Jetpack video wrapper and add returns after CSS declarations.

= 31 July 2014 =
* Add content-single.php file so single views have unique file.
* Do not show dates on sticky posts, except in single views.

= 27 July 2014 =
* Add proper class name back to toggle li.
* Clean up spacing and whitespace to match wordpress.com standards.

= 26 July 2014 =
* Remove unneeded class name on toggle li.
* Remove custom header and implement site logo.

= 24 July 2014 =
* Adjust z-index properties in theme so various areas do not block Gravatars on hover.
* Move spacing in CSS file to tabs for better readability and to align with WordPress standards.

= 23 July 2014 =
* Add styles for wordpress.com widgets and support for Jetpack responsive videos.

= 22 July 2014 =
* Move Editor theme from Dev to Pub directory.

== Change Log ==
= 1.0.6-wpcom - 10/22/15 =
* Fix bug with gallery image links not respecting right widths.

= 1.0.5-wpcom - 09/04/15 =
* Fix image caption spacing.

= 1.0.4-wpcom - 11/04/14 =
The main differences between the 1.0.4 version and 1.0.4-wpcom are:
* ARIA has been added to the tabs interface in the header to improve accessibility.
* The custom logo implementation via the Customizer has been removed in favor of Jetpack’s site logo.
* The custom color implementation via the Customizer has been removed since WordPress.com has a similar feature.
* The bug in the main navigation toggle addressed in 1.0.5 has been kept and fixed instead of removed.
* Any other relevant bugs addressed through 1.0.8 of the theme have been addressed.

= 1.0.4 - 6/25/14 =
* Fixed an issue with icon fonts and styles for Internet Explorer not loading in child themes.

= 1.0.3 - 6/17/14 =
* Added ability to toggle menu open and closed on tablet and mobile.

= 1.0.2 - 6/8/14 =
* Added fix for multiple scrollbars in Chrome on IE.

= 1.0.1 - 6/9/14 =
* Added Font Awesome license info.
* Minor maintenance.

= 1.0 - 5/21/2014 =
* Initial release.

== Upgrade Notice ==
= 1.0.4 =
Fixed an issue with icon fonts and styles for Internet Explorer not loading in child themes.