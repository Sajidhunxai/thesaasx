<?php

function the_block_render_feature_11( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="row gap-y align-items-center my-9">
  <div class="col-md-6">
    <h4>%1$s</h4>
    <p>%2$s</p>
  </div>

  <div class="%3$s">
    %4$s
  </div>
</div>
EOD;

foreach ( $X['features'] as $feature ) {
  $class = "col-md-5 mr-auto order-md-first";
  if ( $feature['switch'] ) {
    $class = "col-md-5 ml-auto";
  }

  $items .= sprintf( $repeater,
    $feature['title'],
    $feature['text'],
    $class,
    thesaasx_render_image( $feature['img'] )
  );
}


$output = <<< EOD
$items
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
