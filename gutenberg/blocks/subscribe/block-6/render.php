<?php

function the_block_render_subscribe_6( $attributes ) {
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
<p class="small-4 text-uppercase ls-2 fw-600 opacity-70">$txtText</p>
<h2>$txtTitle</h2>

<div class="row mt-7">
  $form
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
