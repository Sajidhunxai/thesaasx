<?php

function the_block_render_feature_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<div class="col-6">
  <p>%1$s</p>
  <p class="text-uppercase fw-600 mb-0">%2$s</p>
  <p>%3$s</p>
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
<div class="row">
  <div class="col-md-6 pb-8">
    <h2>$txtTitle</h2>
    <p>$txtText</p>
    <hr class="w-50px ml-0">
    <div class="row">
      $items
    </div>
  </div>

  <div class="col-md-6 align-self-end text-center">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
