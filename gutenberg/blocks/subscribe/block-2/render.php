<?php

function the_block_render_subscribe_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$iconEmail  = thesaasx_render_icon( $X['iconEmail'] );
$btn        = thesaasx_render_button( $X['btn'] );
$img        = thesaasx_render_image( $X['img'] );

$txtTitle   = $X['txtTitle'];
$txtText    = $X['txtText'];


$form = <<< EOD
<div class="input-group">
  $inputEmail
  <span class="input-group-append">
    $btn
  </span>
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row align-items-center">
  <div class="col-md-6">
    <h2>$txtTitle</h2>
    <p class="lead">$txtText</p>
    <br>
    <div class="row">
      $form
    </div>
  </div>

  <div class="col-md-4 ml-auto text-center mt-8 mt-md-0">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
