<?php

function the_block_render_signup_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputPass  = thesaasx_render_input( $X['inputPass'] );

$iconName   = thesaasx_render_icon( $X['iconName'] );
$iconEmail  = thesaasx_render_icon( $X['iconEmail'] );
$iconPass   = thesaasx_render_icon( $X['iconPass'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="form-group input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text">
      $iconName
    </span>
  </div>
  $inputName
</div>

<div class="form-group input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text">
      $iconEmail
    </span>
  </div>
  $inputEmail
</div>

<div class="form-group input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text">
      $iconPass
    </span>
  </div>
  $inputPass
</div>

$btn
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<h2 class="text-center">$txtTitle</h2>
<p class="text-center opacity-70 lead">$txtText</p>
<br>

<div class="row">
  $form
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
