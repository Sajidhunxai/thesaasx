<?php

function the_block_render_contact_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputMessage  = thesaasx_render_input( $X['inputMessage'] );

$txtTitle = $X['txtTitle'];


$mailer = <<< EOD
<div class="form-row">
  <div class="form-group col-md-6">$inputName</div>
  <div class="form-group col-md-6">$inputEmail</div>
</div>

<div class="form-group">$inputMessage</div>
<div class="text-center">$btn</div>
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
<h2 class="text-center">$txtTitle</h2>

<div class="row mt-8">
  $mailer
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
