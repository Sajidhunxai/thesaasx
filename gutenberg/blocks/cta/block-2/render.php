<?php

function the_block_render_cta_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn  = thesaasx_render_button( $X['btn'] );

$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-9">
    <h4 class="mb-0 text-center text-md-left">$txtText</h4>
  </div>

  <div class="col-md-3 text-center text-md-right">
    $btn
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
