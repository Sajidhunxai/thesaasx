<?php

function the_block_render_signup_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="col-10 mx-auto">
  <h2 class="text-center">$txtTitle</h2>
  <p class="text-center lead">$txtText</p>
  <br><br>

  <div class="form-group">
    $inputName
  </div>

  <div class="form-group">
    $inputEmail
  </div>

  $btn
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row">
  <div class="col-md-6 py-11" data-overlay="1">
    $form
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
