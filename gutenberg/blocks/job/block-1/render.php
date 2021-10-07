<?php

function the_block_render_job_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$cards = '';
$repeater = '
<div class="card">
  <h6 class="card-title">
    <a class="d-flex align-items-center collapsed" data-toggle="collapse" href="#collapse-job-%1$s">
      <strong class="mr-auto">%2$s</strong>
      <span class="small text-lighter d-none d-md-block">%3$s</span>
    </a>
  </h6>

  <div id="collapse-job-%1$s" class="collapse" data-parent="#accordion-job">
    <div class="card-body">
      <p>%4$s</p>

      <hr class="w-100px">

      <p class="text-center"><a class="btn btn-lg btn-primary" href="%5$s">%6$s</a></p>
    </div>
  </div>
</div>
';
$args = array(
  'post_type'       => 'the_job',
  'posts_per_page'  => -1,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
  while ( $query->have_posts() ) { $query->the_post();
    $id = get_the_ID();
    $url = get_permalink();
    $title = get_the_title();
    $excerpt = get_the_excerpt();
    $location = get_post_meta( get_the_ID(), 'the_location', true );
    if ( $location !== '' ) {
      $location .= ' <i class="fa fa-map-marker ml-2"></i>';
    }


    $cards .= sprintf( $repeater,
      $id,
      $title,
      $location,
      $excerpt,
      esc_url( $url ),
      esc_html__( 'Apply Now', 'thesaasx' )
    );
  }
endif;
wp_reset_query();


$output = <<< EOD
<div class="accordion accordion-connected shadow-5" id="accordion-job">
  $cards
</div>
EOD;


if ( $cards == '' ) {
  $output = '';
}

if ( $X['serverSideRender'] ) {
  return $output;
}


$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
