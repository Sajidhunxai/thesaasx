<?php

function the_block_render_post_1( $attributes ) {
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
$img = '';
$cats = get_the_category( $post_id );

if ( has_post_thumbnail( $post_id ) ) {
  $thumb = esc_url( get_the_post_thumbnail_url( $post_id ) );
  $img = '<img class="rounded" src="'. $thumb .'" alt="'. esc_attr( $title ) .'">';
}

wp_reset_postdata();


$colAfter = '<div class="col-lg-5 mx-auto">'. $img .'</div>';
$colBefore = '';

if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colAfter = '';
  $colBefore = '<div class="col-lg-5 mx-auto">'. $img .'</div>';
}


$output = <<< EOD
<div class="row gap-y align-items-center">
  $colBefore

  <div class="col-lg-6 text-center text-lg-left">
    <h3>$title</h3>
    <p>$excerpt</p>
    <br/>
    <a class="btn btn-sm btn-outline-primary" href="$url">Read More <i class="ti-arrow-right fs-9 ml-2"></i></a>
  </div>

  $colAfter
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
