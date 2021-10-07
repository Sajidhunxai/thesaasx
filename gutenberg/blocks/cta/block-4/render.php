<?php

function the_block_render_cta_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn   = thesaasx_render_button( $X['btn'] );
$input = thesaasx_render_input( $X['input'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="form-group">
  $input
</div>
$btn
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-6 text-center text-md-left">
    <h3>$txtTitle</h3>
    <p>$txtText</p>
  </div>

  <div class="col-md-auto ml-auto text-center text-md-right">
    $form
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
