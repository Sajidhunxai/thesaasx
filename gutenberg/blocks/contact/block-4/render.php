<?php

function the_block_render_contact_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );
$map        = thesaasx_render_googleMap( $X['map'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputMessage  = thesaasx_render_input( $X['inputMessage'] );

$txtTitle = $X['txtTitle'];


$mailer = <<< EOD
<div class="form-group">
  $inputName
</div>

<div class="form-group">
  $inputEmail
</div>

<div class="form-group">
  $inputMessage
</div>
$btn
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
<div class="row no-gutters">
  <div class="col-md-6 align-self-center py-8">
    <h4 class="text-center">$txtTitle</h4>
    <br>
    <div class="row">
      <div class="col-11 col-md-10 mx-auto">
        $mailer
      </div>
    </div>
  </div>

  <div class="col-md-6">
    $map
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
