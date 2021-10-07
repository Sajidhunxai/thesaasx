<?php

function the_block_render_signup_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn   = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputPass  = thesaasx_render_input( $X['inputPass'] );


$form = <<< EOD
<div class="form-group">
  $inputName
</div>

<div class="form-group">
  $inputEmail
</div>

<div class="form-group">
  $inputPass
</div>
$btn
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row">
  $form
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
