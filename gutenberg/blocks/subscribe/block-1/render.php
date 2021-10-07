<?php

function the_block_render_subscribe_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$iconEmail  = thesaasx_render_icon( $X['iconEmail'] );
$social     = thesaasx_render_socialIcons( $X['social'] );
$btn        = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="form-row">
  <div class="col-md-4 ml-auto mb-4 mb-md-0">
    <div class="input-group input-group-lg">
      <div class="input-group-prepend">
        <span class="input-group-text">$iconEmail</span>
      </div>
      $inputEmail
    </div>
  </div>

  <div class="col-md-2 mr-auto">
    $btn
  </div>
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<h2>$txtTitle</h2>
<br>
<p class="lead">$txtText</p>
<br><br>
$form
<br><br><br>
$social
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
