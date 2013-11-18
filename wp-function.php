userguide
=========

WP guide
--


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



