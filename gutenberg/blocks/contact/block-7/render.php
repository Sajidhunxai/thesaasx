<?php

function the_block_render_contact_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );
$social     = thesaasx_render_socialIcons( $X['social'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputMessage  = thesaasx_render_input( $X['inputMessage'] );

$txtTitle = $X['txtTitle'];
$txtTitleSocial = $X['txtTitleSocial'];
$txtTitleAddress = $X['txtTitleAddress'];
$txtAddress = $X['txtAddress'];
$txtEmail = $X['txtEmail'];
$txtPhone = $X['txtPhone'];


$mailer = <<< EOD
<div class="form-row">
  <div class="form-group col-md-6">
    $inputName
  </div>

  <div class="form-group col-md-6">
    $inputEmail
  </div>
</div>

<div class="form-group">
  $inputMessage
</div>
$btn
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
<div class="row gap-y">
  <div class="col-lg-6">
    <h3>$txtTitle</h3>
    <br>
    $mailer
  </div>

  <div class="col-lg-5 ml-auto text-center text-lg-left">
    <hr class="d-lg-none">
    <h3>$txtTitleAddress</h3>
    <br>
    <p>$txtAddress</p>
    <p>$txtPhone</p>
    <p>$txtEmail</p>
    <div class="fw-400">$txtTitleSocial</div>
    $social
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
