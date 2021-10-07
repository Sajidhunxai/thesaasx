<?php

function the_block_render_header_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtLink = $X['txtLink'];


$permalink = esc_url( get_permalink() );
$title = get_the_title();
$subtitle = get_post_meta( get_the_ID(), 'the_subtitle', true );

if ( empty( $title ) ) {
  $title = get_the_date();
}

$thumb = '';
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
<div class="row">
  <div class="col-md-6">
    <h1 class="fw-200 mb-6">$title</h1>
    <p class="lead-2">$subtitle</p>

    <hr class="w-50px ml-0">

    <p class="small link-muted">$txtLink</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
