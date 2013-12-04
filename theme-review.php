http://codex.wordpress.org/Theme_Development#Theme_Testing_Process


1. Remove this page: http://d.pr/i/OTeW

2. Use JavaScript's strict mode https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions_and_function_scope/Strict_mode

3. Import the Theme Unit Test [http://codex.wordpress.org/Theme_Unit_Test] file and  make sure that:

- Posts display correctly, with no apparent visual problems or errors.
- Posts display in correct order.
- Page navigation displays and works correctly.
- As "sticky posts" are a core feature, the theme should style and display them appropriately.
- Lack of body text should not adversely impact the layout.
- Theme must incorporate both the "Tag" and the "Category" taxonomies in some manner.
- Floats are cleared properly for floated element (thumbnail image) at the end of the post content.

4. Please debug your theme:

- Enable WP_DEBUG and fix all the notices and warnings

- Install http://wordpress.org/extend/plugins/developer as “Theme for a self-hosted WordPress installation”, and let it install the following debug tools:

* Debug Bar
* Debug Bar Cron
* Log Deprecated Notices
* Monster Widget
* Theme Check




WP101

http://wpseek.com/attribute_escape/


curl is not allowed in theme, if u need curl function u can use in plugins

------------------------------------------------------------------------------------------------------------------
Fix for "Notice: attribute_escape is deprecated since version 2.8! Use esc_attr"
------------------------------------------------------------------------------------------------------------------

/*
If WP_DEBUG in wp-config.php is set to true and you load the admin dashboard in WordPress 3.5.x, this plugin causes an error like:
Notice: attribute_escape is deprecated since version 2.8! Use esc_attr() instead in ...
*/

Here is a quick fix for that:
In file dashboard-pending-review.php locate this:

$item = "<h4><a href='$url' title='" . sprintf( __( 'Edit "%s"' ), attribute_escape( $title ) ) . "'>$title</a>";

Replace with this:

$item = "<h4><a href='$url' title='" . sprintf( __( 'Edit "%s"' ), esc_attr( $title ) ) . "'>$title</a>";

or you can try this trick 

//http://wpseek.com/attribute_escape/
//SOURCE [ WORDPRESS 3.8-BETA-1-26375 ]

function attribute_escape( $text ) {
	_deprecated_function( __FUNCTION__, '2.8', 'esc_attr()' );
	return esc_attr( $text );
}


------------------------------------------------------------------------------------------------------------------
must ready in your css 
------------------------------------------------------------------------------------------------------------------

REQUIRED:License URI: is missing from your style.css header.
REQUIRED:.wp-caption css class is needed in your theme css.
REQUIRED:.wp-caption-text css class is needed in your theme css.
REQUIRED:.gallery-caption css class is needed in your theme css.
REQUIRED:.bypostauthor css class is needed in your theme css.
REQUIRED:.alignright css class is needed in your theme css.
REQUIRED:.alignleft css class is needed in your theme css.
REQUIRED:.aligncenter css class is needed in your theme css.
REQUIRED: This theme doesn't seem to display tags. Modify it to display tags in appropriate locations.
REQUIRED: The theme doesn't have post pagination code in it. Use posts_nav_link() or paginate_links() or next_posts_link() and previous_posts_link() to add post pagination.

bloginfo('home') was found in the file header.php. Use echo home_url() instead. 

REQUIRED: Could not find wp_link_pages. See: wp_link_pages
 <?php wp_link_pages( $args ); ?>
REQUIRED: Could not find post_class. See: post_class
 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
REQUIRED: Could not find language_attributes. See: language_attributes
<html <?php language_attributes(); ?>
REQUIRED: Could not find comments_template. See: comments_template
 <?php comments_template( $file, $separate_comments ); ?>
REQUIRED: Could not find body_class call in body tag. See: body_class
 <?php body_class( $class ); ?>
REQUIRED: bloginfo('home') was found in the file header.php. Use echo home_url() instead.
Line 87: <form method='get' id='searchform' action='<?php bloginfo('home'); ?>' >
REQUIRED: automatic_feed_links found in the file theme-init.php. Deprecated since version 3.0. Use add_theme_support( 'automatic-feed-links' ) instead.
Line 125: automatic_feed_links();
