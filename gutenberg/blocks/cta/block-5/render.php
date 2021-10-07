<?php

function the_block_render_cta_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn      = thesaasx_render_button( $X['btn'] );
$imgMain  = thesaasx_render_image( $X['imgMain'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-6 text-center">
    $imgMain
  </div>

  <div class="col-md-6 text-center text-md-left">
    <h2>$txtTitle</h2>
    <p class="lead mb-6">$txtText</p>
    <p>$btn</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
