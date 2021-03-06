userguide
=========

WP guide
--
wpmayor
http://freecourses.tutsplus.com/



/* --------------------------------------------------------
REGISTER SIDEBAR 
--------------------------------------------------------*/
// Sidebar Right
register_sidebar( array(
	'id' => 'foundation_sidebar_right',
	'name' => __( 'Sidebar', 'envalabs' ),
	'description' => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div><div class="clear"></div>',
	'before_title' => '<h4 class="w_title">',
	'after_title' => '</h4>',
) );

/* --
Display sidebar in theme

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?><?php endif; ?>

--*/


/* --------------------------------------------------------
Little hack for widget title, so  it could use html tags 
--------------------------------------------------------*/
function html_widget_title( $title ) {
//HTML tag opening/closing brackets
$title = str_replace( '&lt;', '<', $title );
$title = str_replace( '&gt;', '>', $title );
$title = str_replace( '&quot;', '"', $title );
$title = str_replace( '"', '"', $title );
$title = str_replace( '[', '<', $title );
$title = str_replace( ']', '>', $title );
return $title;
}
add_filter( 'widget_title', 'html_widget_title' );


/*--------------------------------------------------------------*/
// POST THUMBNAIL
/*--------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' ); 
function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image AND isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}



require 'image-resize.php';
function theme_thumb($url, $width, $height=0, $align='') {
  return mr_image_resize($url, $width, $height, true, $align, true);
}

/* usage in theme
$thumb = theme_thumb($image_url, 800, 600, 'c'); // Crops from bottom right
*/


/*--------------------------------------------------------------*/
// Enable shortcode on widget
/*--------------------------------------------------------------*/

add_filter('widget_text', 'do_shortcode');


/*--------------------------------------------------------------*/
// Remove admin menus
/*--------------------------------------------------------------*/

//Remove top level admin menus
function remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'link-manager.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'users.php' );
    remove_menu_page( 'options-general.php' );
    remove_menu_page( 'upload.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'themes.php' );
}

//Remove sub level admin menus
function remove_admin_submenus() {
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
    remove_submenu_page( 'edit.php', 'post-new.php' );
    remove_submenu_page( 'themes.php', 'nav-menus.php' );
    remove_submenu_page( 'themes.php', 'widgets.php' );
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
    remove_submenu_page( 'plugins.php', 'plugin-install.php' );
    remove_submenu_page( 'users.php', 'users.php' );
    remove_submenu_page( 'users.php', 'user-new.php' );
    remove_submenu_page( 'upload.php', 'media-new.php' );
    remove_submenu_page( 'options-general.php', 'options-writing.php' );
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    remove_submenu_page( 'options-general.php', 'options-reading.php' );
    remove_submenu_page( 'options-general.php', 'options-discussion.php' );
    remove_submenu_page( 'options-general.php', 'options-media.php' );
    remove_submenu_page( 'options-general.php', 'options-privacy.php' );
    remove_submenu_page( 'options-general.php', 'options-permalinks.php' );
    remove_submenu_page( 'index.php', 'update-core.php' );
}
add_action( 'admin_menu', 'remove_admin_submenus' );


/*----------------------------------
how to create custome columns post type
---------------------------------------*/
http://shibashake.com/wordpress-theme/add-custom-post-type-columns
http://shibashake.com/wordpress-theme/modify-custom-taxonomy-columns


/*---------------------------------------
wp nice link
-------------------------------------------*/
http://wpmu.org/how-to-write-a-wordpress-plugin-12-essential-guides-and-resources/
http://wp.tutsplus.com/tutorials/creative-coding/show-yourself-off-with-a-custom-author-box/
http://codex.wordpress.org/WordPress_Coding_Standards
http://wp.tutsplus.com/tutorials/creative-coding/creating-a-simple-contact-form-for-simple-needs/
http://wp.tutsplus.com/tutorials/add-lazy-loading-social-sharing-buttons-to-your-wordpress-blog/
http://wp.tutsplus.com/tutorials/creative-coding/customizing-comments-in-wordpress-functionality-and-appearance/
http://wp.tutsplus.com/tutorials/creative-coding/admin-panel-post-column-management/
http://www.sitepoint.com/create-a-voting-plugin-for-wordpress/
http://wptheming.com/2012/03/infinite-scroll-to-wordpress-theme/
http://wptheming.com/2012/07/options-framework-theme-customizer/
http://www.hongkiat.com/blog/wordpress-google-cse/
http://themeforest.net/forums/thread/custom-wordpress-search-tutorials/29279

/*------------------------------------------
the different include() , include_once(), require(), require_once()
-------------------------------------------*/
http://wp.tutsplus.com/tutorials/creative-coding/how-to-include-and-require-files-and-templates-in-wordpress/

/*-----------------------------------------
logic loop in loop
------------------------------------------*/
	echo 'li-';
		$b=15;
		for($a=1;$a<=$b;$a++){
			echo $a;
			$cek4 = $a %4;
			if($cek4==0){
			    if($a==$b){}else{
				echo'-/li = li- <br/>';
				}
			}
			
			if($a >=$b){
				echo '-li';
			}
		}  




