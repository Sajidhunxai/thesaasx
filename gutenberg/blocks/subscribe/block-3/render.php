<?php

function the_block_render_subscribe_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$iconEmail  = thesaasx_render_icon( $X['iconEmail'] );
$btn        = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="input-group input-group-lg">
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
<h2>$txtTitle</h2>
<br>
<p class="lead">$txtText</p>

<div class="row mt-8">
  $form
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
