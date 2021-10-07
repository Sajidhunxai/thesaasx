<?php

function the_block_render_header_6( $attributes ) {
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
$date = get_the_date();

if ( ! is_singular() ) {
  $title = get_the_archive_title();
  $subtitle = get_post_meta( get_option( 'page_for_posts' ), 'the_subtitle', true );
}


if ( has_post_thumbnail() ):

  if ( isset( $X['section']['background']['type'] ) && $X['section']['background']['type'] === 'image' ) {
    $X['section']['background']['image'] = $thumb;
  }
  elseif ( isset( $X['section']['default']['background']['type'] ) && $X['section']['default']['background']['type'] === 'image' ) {
    $X['section']['default']['background']['image'] = $thumb;
  }

endif;

$category = '';
$metas = $date;
$image = '';

if ( count( $cats ) > 0 ) {
  $cat_url = get_category_link( $cats[0]->term_id );
  $category = '<a href="'. esc_url( $cat_url ) .'">'. $cats[0]->name .'</a>';

  $metas .= ' '. esc_html__( 'in', 'thesaasx' ) .' '. $category;
}

if ( $thumb !== '' ) {
  $image = '<br><br><img class="rounded-md" src="'. $thumb .'" alt="'. esc_attr( $title ) .'">';
}


$output = <<< EOD
<h1>$title</h1>
<p>$metas</p>
$image
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
