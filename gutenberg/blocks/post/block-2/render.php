<?php

function the_block_render_post_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$post_id = $X['postId'];
global $post;
$post = get_post( $post_id );
setup_postdata( $post );

if ( ! isset( $post->ID ) ) {
  return 'Post not found!';
}


$url = esc_url( get_permalink( $post_id ) );
$title = $post->post_title;
$excerpt = get_the_excerpt();
$thumb = esc_url( get_the_post_thumbnail_url( $post_id ) );
$cats = get_the_category( $post_id );
$cat_name = "";
$cat_url = "";

if ( count( $cats ) > 0 ) {
  $cat = $cats[0];
  $cat_name = $cat->name;
  $cat_url = get_category_link( $cat->term_id );
}

wp_reset_postdata();


$colAfter = '';
$colBefore = '<div class="col-md-6 bg-img mh-300" style="background-image: url('. $thumb .');"></div>';

if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colAfter = '<div class="col-md-6 bg-img mh-300" style="background-image: url('. $thumb .');"></div>';
  $colBefore = '';
}


$output = <<< EOD
<div class="row no-gutters">
  $colBefore

  <div class="col-10 col-md-4 mx-auto py-8 text-center text-md-left">
    <p class="small-2 text-light">$cat_name</p>
    <h4>$title</h4>
    <p>$excerpt</p>
    <br>
    <a class="btn btn-round btn-primary" href="$url">Read More</a>
  </div>

  $colAfter
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
