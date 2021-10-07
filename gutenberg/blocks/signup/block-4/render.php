<?php

function the_block_render_signup_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputPass  = thesaasx_render_input( $X['inputPass'] );


$txtTitle = $X['txtTitle'];


$form = <<< EOD
<div class="col-md-6 col-lg-3">
  $inputName
</div>

<div class="col-md-6 col-lg-3">
  $inputEmail
</div>

<div class="col-md-6 col-lg-3">
  $inputPass
</div>

<div class="col-md-6 col-lg-3">
  $btn
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<h2 class="text-center fw-200">$txtTitle</h2>
$form
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
