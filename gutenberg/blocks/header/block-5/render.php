<?php

function the_block_render_header_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

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


$category = '';
$author = '';
$flash_down = '';

if ( count( $cats ) > 0 ) {
  $category = '<p class="opacity-70 text-uppercase small ls-1">'. $cats[0]->name .'</p>';
}

// We don't display the author name for now
if ( false ) {
  $author_id = get_the_author_meta('ID');
  $author_name = get_the_author_meta('display_name');
  $author = sprintf('<p><span class="opacity-70 mr-1">%1$s</span> <a class="text-white" href="%2$s">%3$s</a></p><p><img class="avatar avatar-sm" src="%4$s" alt="%5$s"></p>',
    esc_html__( 'By', 'thesaasx' ),
    esc_url( get_author_posts_url( $author_id ) ),
    $author_name,
    esc_url( get_avatar_url( $author_id ) ),
    esc_attr( $author_name )
  );
}


if ( ( isset( $X['section']['fullscreen'] ) && $X['section']['fullscreen'] == true ) || ( isset( $X['section']['default']['fullscreen'] ) && $X['section']['default']['fullscreen'] == true ) ) {
  $flash_down = '<a class="scroll-down-1 scroll-down-white" href="#post-content"><span></span></a>';
}


$output = <<< EOD
<div class="row h-100">
  <div class="col-lg-8 mx-auto align-self-center">
    $category
    <h1 class="display-4 mt-7 mb-8">$title</h1>
    $author
  </div>

  <div class="col-12 align-self-end text-center">$flash_down</div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
