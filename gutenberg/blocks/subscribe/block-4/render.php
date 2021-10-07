<?php

function the_block_render_subscribe_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$iconEmail  = thesaasx_render_icon( $X['iconEmail'] );
$btn        = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">$iconEmail</span>
  </div>
  $inputEmail
  <span class="input-group-append">
    $btn
  </span>
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-6">
    <p class="lead mb-0 text-center text-md-left">$txtText</p>
  </div>

  <div class="col-md-4 ml-auto">
    $form
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
