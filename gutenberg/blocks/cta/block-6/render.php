<?php

function the_block_render_cta_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn   = thesaasx_render_button( $X['btn'] );
$input = thesaasx_render_input( $X['input'] );


$form = <<< EOD
<div class="form-group input-group input-group-lg">
  $input
  <div class="input-group-append">
    $btn
  </div>
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row">
  <div class="col-md-8 col-xl-6 mx-auto">
    $form
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
