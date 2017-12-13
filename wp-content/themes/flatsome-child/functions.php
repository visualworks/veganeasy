<?php
// Add custom Theme Functions here


 	function custom_variable_price_html( $price, $product ) {
 	$price = '';
 	if ( ! $product->min_variation_price || $product->min_variation_price !== $product->max_variation_price ) {
 	$price .= '<span class="from">' . __( 'A partir de' ) . ' </span>';
 	}
 	$price .= woocommerce_price( $product->get_price() );
 	return $price;
 	} 
 	add_filter( 'woocommerce_variable_price_html', 'custom_variable_price_html', 10, 2 );



add_action( 'init', function () {
 add_ux_builder_post_type(receita); 
} );


 	// function custom_variable_price_html( $price, $product ) {
 	// $price = '';
 	// if ( ! $product->min_variation_price || $product->min_variation_price !== $product->max_variation_price ) {
 	// $price .= '<span class="from">' . __( 'A partir de' ) . ' </span>';
 	// }
 	// $price .= woocommerce_price( $product->get_price() );
 	// if ( $product->max_variation_price && $product->max_variation_price !== $product->min_variation_price ) {
 	// $price .= '<span class="to"> ' . __( 'até' ) . ' </span>';
 	// $price .= woocommerce_price( $product->max_variation_price );
 	// }
 	// return $price;
 	// }
 	// add_filter( 'woocommerce_variable_price_html', 'custom_variable_price_html', 10, 2 );




    //add my_print to query vars
// function add_print_query_vars($vars) {
//     // add my_print to the valid list of variables
//     $new_vars = array('my_print');
//     $vars = $new_vars + $vars;
//     return $vars;
// }

// add_filter('query_vars', 'add_print_query_vars');


// add_action("template_redirect", 'my_template_redirect_2322');

// // Template selection
// function my_template_redirect_2322()
// {
//     global $wp;
//     global $wp_query;
//     if (isset($wp->query_vars["my_print"]))
//     {
//         include(TEMPLATEPATH . '/my_print_themplate.php');
//         die();

//     }
// }



// function my_get_posts( $query ) {
// 	if(  is_home() && $query->is_main_query() ) {
// 	$query->set( 'post_type', array( 'post', 'receita', 'blocks' ) );
//   	return $query;	
// 	}
// }
// add_filter( 'pre_get_posts', 'my_get_posts' );


// add_action( ‘init’, function () { add_ux_builder_post_type('receita'); } );


?>