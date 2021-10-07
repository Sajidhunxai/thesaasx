<?php

function the_block_render_feature_10( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$link = thesaasx_render_readMore( $X['link'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<p>
  %1$s
  <span class="fs-14">%2$s</span>
</p>
EOD;

foreach ( $X['features'] as $feature ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
    $feature['text']
  );
}


$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-lg-6 mx-auto">
    <h2>$txtTitle</h2>
    <p class="lead mb-7">$txtText</p>

    $items

    <p class="mt-7">$link</p>
  </div>

  <div class="col-lg-5 align-self-center order-md-first">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
