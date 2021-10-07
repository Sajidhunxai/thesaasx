<?php

function the_block_render_header_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$permalink = esc_url( get_permalink() );
$title = get_the_title();
$subtitle = get_post_meta( get_the_ID(), 'the_subtitle', true );

if ( empty( $title ) ) {
  $title = get_the_date();
}

$thumb = esc_url( get_the_post_thumbnail_url() );
$cats = get_the_category();
$date = get_post_time();

if ( ! is_singular() ) {
  $title = get_the_archive_title();
  $subtitle = get_post_meta( get_option( 'page_for_posts' ), 'the_subtitle', true );
}


if ( has_post_thumbnail() ):

  if ( isset( $X['section']['background']['type'] ) && $X['section']['background']['type'] === 'image' ) {
    $thumb = esc_url( get_the_post_thumbnail_url() );
    $X['section']['background']['image'] = $thumb;
  }
  elseif ( isset( $X['section']['default']['background']['type'] ) && $X['section']['default']['background']['type'] === 'image' ) {
    $thumb = esc_url( get_the_post_thumbnail_url() );
    $X['section']['default']['background']['image'] = $thumb;
  }

endif;


$output = <<< EOD
<h1>$title</h1>
<p class="lead-2 opacity-90 mt-6">$subtitle</p>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
