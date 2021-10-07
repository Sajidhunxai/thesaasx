<?php

function the_block_render_feature_15( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$link = thesaasx_render_readMore( $X['link'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$itemsLeft = '';
$itemsRight = '';
$repeater = <<< 'EOD'
<p>%1$s %2$s</p>
EOD;

foreach ( $X['featuresLeft'] as $feature ) {
  $itemsLeft .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
    $feature['text']
  );
}

foreach ( $X['featuresRight'] as $feature ) {
  $itemsRight .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
    $feature['text']
  );
}

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-lg-6 mx-auto">
    <h2>$txtTitle</h2>
    <p class="lead mb-7">$txtText</p>

    <div class="row">
      <div class="col-md-6">$itemsLeft</div>
      <div class="col-md-6">$itemsRight</div>
    </div>

    <p class="mt-6">$link</p>
  </div>

  <div class="col-lg-5 align-self-center order-md-first text-center">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
