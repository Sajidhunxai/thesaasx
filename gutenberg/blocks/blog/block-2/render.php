<?php

function the_block_render_blog_2( $attributes ) {
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
    <div class="card-body">
      <h5 class="card-title"><a href="%1$s">%4$s</a></h5>
      <a class="fw-600 fs-12" href="%1$s">Read more <i class="ti-angle-right fs-7 pl-2"></i></a>
    </div>
  </div>
</div>
EOD;

$repeaterNoImage = <<< 'EOD'
<div class="col-md-6 col-lg-4">
  <div class="card border hover-shadow-6">
    <div class="card-body">
      <h5 class="card-title"><a href="%1$s">%4$s</a></h5>
      <a class="fw-600 fs-12" href="%1$s">Read more <i class="ti-angle-right fs-7 pl-2"></i></a>
    </div>
  </div>
</div>
EOD;

foreach( $recent_posts as $rpost ) {
  global $post;
  $post = $rpost;
  setup_postdata( $post );

  $url = get_permalink( $post['ID'] );
  $title = $post['post_title'];
  //$excerpt = get_the_excerpt();
  $thumb = get_the_post_thumbnail_url( $post['ID'] );

  $template = $repeater;
  if ( ! has_post_thumbnail( $post['ID'] ) ) {
    $template = $repeaterNoImage;
  }

  $posts .= sprintf( $template,
    esc_url( $url ),
    esc_url( $thumb ),
    esc_attr( $title ),
    $title
  );

  wp_reset_postdata();
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
