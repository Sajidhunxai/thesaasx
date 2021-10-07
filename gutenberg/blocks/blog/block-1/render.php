<?php

function the_block_render_blog_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$postsNum = isset($X['postsNum']) ? $X['postsNum'] : 3;

$recent_posts = wp_get_recent_posts( array(
  'numberposts' => $postsNum,
  'post_status' => 'publish',
));

/*
if ( count( $recent_posts ) === 0 ) {
  return '';
}
*/

$posts = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-lg-4">
  <div class="card border hover-shadow-6">
    <a href="%1$s"><img class="card-img-top" src="%2$s" alt="%3$s"></a>
    <div class="p-6 text-center">
      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="%4$s">%5$s</a></p>
      <h5 class="mb-0"><a class="text-dark" href="%1$s">%6$s</a></h5>
    </div>
  </div>
</div>
EOD;

$repeaterNoImage = <<< 'EOD'
<div class="col-md-6 col-lg-4">
  <div class="card border hover-shadow-6">
    <div class="p-6 text-center">
      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="%4$s">%5$s</a></p>
      <h5 class="mb-0"><a class="text-dark" href="%1$s">%6$s</a></h5>
    </div>
  </div>
</div>
EOD;

foreach( $recent_posts as $post ) {
  $url = get_permalink( $post['ID'] );
  $title = $post['post_title'];
  $thumb = get_the_post_thumbnail_url( $post['ID'] );
  $cats = get_the_category( $post['ID'] );
  $cat_url = "";
  $cat_name = "";

  if ( count( $cats ) > 0 ) {
    $cat = $cats[0];
    $cat_name = $cat->name;
    $cat_url = get_category_link( $cat->term_id );
  }

  $template = $repeater;
  if ( ! has_post_thumbnail( $post['ID'] ) ) {
    $template = $repeaterNoImage;
  }

  $posts .= sprintf( $template,
    esc_url( $url ),
    esc_url( $thumb ),
    esc_attr( $title ),
    esc_url( $cat_url ),
    $cat_name,
    $title
  );

}

wp_reset_query();

$posts = '<div class="row gap-y">'. $posts .'</div>';

if ( $X['serverSideRender'] ) {
  return $posts;
}

$output = <<< EOD
<h2 class="text-center mb-8">$txtTitle</h2>
$posts
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
