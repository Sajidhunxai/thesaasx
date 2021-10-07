<?php

function the_block_render_feature_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<div class="col-6">
  <p>%1$s</p>
  <h5>%2$s</h5>
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
  <div class="col-md-6 align-self-center pb-7">
    <h3>$txtTitle</h3>
    <p>$txtText</p>
    <div class="row mt-7">
      $items
    </div>
  </div>

  <div class="col-md-6 text-center order-md-first">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
