<?php

function the_block_render_signup_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );

$txtTitle = $X['txtTitle'];


$form = <<< EOD
<div class="col-md-4 ml-auto">
  $inputName
</div>

<div class="col-md-4 mr-auto">
  $inputEmail
</div>

<div class="col-12 text-center">
  $btn
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row">
  <div class="col-md-8 mx-auto">
    <h2 class="text-center mb-8">$txtTitle</h2>
    $form
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
