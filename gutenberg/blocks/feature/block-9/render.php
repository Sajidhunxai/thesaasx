<?php

function the_block_render_feature_9( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6">
  %1$s
  <h6 class="text-uppercase mb-3">%2$s</h6>
  <p class="fs-14">%3$s</p>
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
<div class="row gap-y">
  <div class="col-10 col-lg-6 mx-auto text-center text-lg-left">
    <h2>$txtTitle</h2>
    <p class="lead">$txtText</p>
    <br>
    <div class="row gap-y">
      $items
    </div>
  </div>

  <div class="col-lg-5 align-self-center">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
