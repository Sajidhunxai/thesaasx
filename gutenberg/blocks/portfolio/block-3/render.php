<?php

function the_block_render_portfolio_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$postsNum = isset($X['postsNum']) ? $X['postsNum'] : 6;

$items = '';
$repeater = '
<div class="col-md-4" data-shuffle="item" data-groups="%1$s">
  <a class="hover-move-up" href="%2$s">
    <img src="%3$s" alt="%4$s">
    <div class="text-center pt-5">
      <h5 class="mb-0">%5$s</h5>
      <small class="small-5 text-lightest text-uppercase ls-2">%6$s</small>
    </div>
  </a>
</div>
';


$args = array(
  'post_type'       => 'the_portfolio',
  'posts_per_page'  => $postsNum,
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
      implode( $groups, ',' ),
      esc_url( $url ),
      $img,
      esc_attr( $title ),
      $title,
      implode( $cats, ', ' )
    );
  }
endif;
wp_reset_query();

$filters_html = '';
if ( count( $filters ) > 0 ) :
  $filters_html = '<li class="nav-item"><a class="nav-link active" href="#" data-shuffle="button">All</a></li>';

  foreach ($filters as $slug => $name) {
    $filters_html .= '<li class="nav-item"><a class="nav-link" href="#" data-shuffle="button" data-group="'. $slug .'">'. $name .'</a></li>';
  }
endif;


$output = <<< EOD
<div data-provide="shuffle">
  <ul class="nav nav-center nav-bold nav-uppercase nav-dot mb-7" data-shuffle="filter">
    $filters_html
  </ul>

  <div class="row gap-y" data-shuffle="list">
    $items
  </div>
</div>
EOD;


if ( $items == '' ) {
  $output = '';
}

if ( $X['serverSideRender'] ) {
  return $output;
}


$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
