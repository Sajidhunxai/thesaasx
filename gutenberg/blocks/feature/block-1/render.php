<?php

function the_block_render_feature_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$btn = thesaasx_render_button( $X['btn'] );


$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-xl-4">
  <div class="media">
    <div class="line-height-1 w-70px">%1$s</div>
    <div class="media-body">
      <h5>%2$s</h5>
      <p>%3$s</p>
    </div>
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
<div class="row gap-y">
  <div class="col-md-8 mx-auto mb-7">
    $img
  </div>
  <div class="w-100"></div>
  $items
  <div class="col-12 text-center">
    <br><br>
    $btn
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
