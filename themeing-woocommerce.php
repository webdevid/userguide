// sample loop  ==================================================================================

<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				woocommerce_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->



// display count cart & price  ==================================================================================

<?php global $woocommerce; ?>
 
<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> 
- <?php echo $woocommerce->cart->get_cart_total(); ?>
</a>


// display count cart & price  ==================================================================================


http://wordpress.org/support/topic/get-product-price-in-custom-loop

http://www.remicorson.com/category/plugins/free/

http://stackoverflow.com/questions/17144540/display-products-from-2-categories-in-woo-commerce

http://stackoverflow.com/questions/13267124/making-custom-woocommerce-loop



<?php
/**
 * Plugin Name: WooCommerce - List Products by Tags
 * Plugin URI: http://www.remicorson.com/list-woocommerce-products-by-tags/
 * Description: List WooCommerce products by tags using a shortcode, ex: [woo_products_by_tags tags="shoes,socks"]
 * Version: 1.0
 * Author: Remi Corson
 * Author URI: http://remicorson.com
 * Requires at least: 3.5
 * Tested up to: 3.5
 *
 * Text Domain: -
 * Domain Path: -
 *
 */
 
/*
 * List WooCommerce Products by tags
 *
 * ex: [woo_products_by_tags tags="shoes,socks"]
 */
function woo_products_by_tags_shortcode( $atts, $content = null ) {
  
	// Get attribuets
	extract(shortcode_atts(array(
		"tags" => ''
	), $atts));
	
	ob_start();
 
	// Define Query Arguments
	$args = array( 
				'post_type' 	 => 'product', 
				'posts_per_page' => 5, 
				'product_tag' 	 => $tags 
				);
	
	// Create the new query
	$loop = new WP_Query( $args );
	
	// Get products number
	$product_count = $loop->post_count;
	
	// If results
	if( $product_count > 0 ) :
	
		echo '<ul class="products">';
		
			// Start the loop
			while ( $loop->have_posts() ) : $loop->the_post(); global $product;
			
				global $post;
				
				echo "<p>" . $thePostID = $post->post_title. " </p>";
				
				if (has_post_thumbnail( $loop->post->ID )) 
					echo  get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); 
				else 
					echo '<img src="'.$woocommerce->plugin_url().'/assets/images/placeholder.png" alt="" width="'.$woocommerce->get_image_size('shop_catalog_image_width').'px" height="'.$woocommerce->get_image_size('shop_catalog_image_height').'px" />';
		
			endwhile;
		
		echo '</ul><!--/.products-->';
	
	else :
	
		_e('No product matching your criteria.');
	
	endif; // endif $product_count > 0
	
	return ob_get_clean();
 
}
 
add_shortcode("woo_products_by_tags", "woo_products_by_tags_shortcode");



			
