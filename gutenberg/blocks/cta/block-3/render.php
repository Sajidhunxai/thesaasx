<?php

function the_block_render_cta_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn      = thesaasx_render_button( $X['btn'] );
$imgMain  = thesaasx_render_image( $X['imgMain'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-6 mx-auto">
    <p>$imgMain</p>
    <br>
    <h3 class="mb-6 fw-500">$txtTitle</h3>
    <p class="lead text-muted">$txtText</p>
    <br>
    $btn
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
