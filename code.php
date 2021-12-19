<?php
// add custom columns to dashboard
add_filter( 'manage_vendor_posts_columns', 'carbondigital_cpt_vendor_columns' );
function carbondigital_cpt_vendor_columns( $columns ) {
  $columns['shop_url'] = __( 'Shop URL');
  $columns['vendor_logo'] = __( 'Logo');
  return $columns;
}

// populate data for custom columns in dashboard
add_action( 'manage_vendor_posts_custom_column', 'carbondigital_cpt_vendor_column', 10, 2);
function carbondigital_cpt_vendor_column( $column, $post_id ) {
  // ADVANCED CUSTOM FIELDS
  // Shop URL Column
  if ( 'shop_url' === $column ) {
    $siteURL = get_post_meta( $post_id, 'shop_url', true );

    if ( ! $siteURL ) {
      _e( '' );  
    } else {
      echo $siteURL;
    }
  }
  
  // WORDPRESS DEFAULT FIELDS
  // Image column
  if ( 'vendor_logo' === $column ) {
    echo get_the_post_thumbnail( $post_id, array(80, 80) );
  }
	
}

?>
