<?php

function the_block_render_portfolio_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];

$items = '';
$repeater = '
<div class="col-6 col-lg-3">
  <a class="portfolio-1" href="%1$s">
    <img src="%2$s" alt="%3$s">
    <div class="portfolio-detail">
      <h5>%4$s</h5>
      <p>%5$s</p>
    </div>
  </a>
</div>
';

$post_id = get_the_ID();
$args = array(
  'post_type'       => 'the_portfolio',
  'posts_per_page'  => 4,
  'ignore_sticky_posts' => 1,
  'orderby' => 'rand',
  'post__not_in'=>array($post_id)
);

$query = new WP_Query( $args );
$filters = [];
if ( $query->have_posts() ) :
  while ( $query->have_posts() ) { $query->the_post();
    $id = get_the_ID();
    $url = get_permalink();
    $title = get_the_title();
    $img = get_the_post_thumbnail_url();
    $excerpt = get_the_excerpt();
    $groups = [];
    $cats = [];

    $terms = get_the_terms( $id, 'the_portfolio_cat' );
    if ($terms) {
      foreach ( $terms as $term ) {
        $groups[] = $term->slug;
        $cats[] = $term->name;
        $filters[ $term->slug ] = $term->name;
      }
    }

    $items .= sprintf( $repeater,
      esc_url( $url ),
      $img,
      esc_attr( $title ),
      $title,
      implode( $cats, ', ' )
    );
  }
endif;
wp_reset_query();


$output = <<< EOD
<div class="row gap-y gap-2">
  $items
</div>
EOD;


if ( $items == '' ) {
  return '';
}

if ( $X['serverSideRender'] ) {
  return $output;
}

$output = '<h5 class="mb-6">'. $txtTitle .'</h5>'. $output;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
