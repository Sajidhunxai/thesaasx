<?php

function the_block_render_feature_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<div class="media my-5">
  <div class="lh-2 mr-5">%1$s</div>
  <div class="media-body">
    <h6>%2$s</h6>
    <p>%3$s</p>
  </div>
</div>
EOD;

foreach ( $X['features'] as $feature ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
    $feature['title'],
    $feature['text']
  );
}


$output = <<< EOD
<div class="row align-items-center">
  <div class="col-md-5 pb-8">
    <h2>$txtTitle</h2>
    <p class="lead">$txtText</p>
    $items
  </div>

  <div class="col-md-5 text-center mx-auto">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
