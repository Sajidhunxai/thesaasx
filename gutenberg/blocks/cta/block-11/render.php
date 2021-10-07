<?php

function the_block_render_cta_11( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn  = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-8 col-lg-6">
    <h2>$txtTitle</h2>
    <p class="lead-2">$txtText</p>
    <br>
    <p>$btn</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
