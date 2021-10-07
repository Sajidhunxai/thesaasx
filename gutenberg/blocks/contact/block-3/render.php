<?php

function the_block_render_contact_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );
$social        = thesaasx_render_socialIcons( $X['social'] );

$inputFirstname  = thesaasx_render_input( $X['inputFirstname'] );
$inputLastname  = thesaasx_render_input( $X['inputLastname'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputPhone = thesaasx_render_input( $X['inputPhone'] );
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
    $inputFirstname
  </div>

  <div class="form-group col-md-6">
    $inputLastname
  </div>

  <div class="form-group col-md-6">
    $inputEmail
  </div>

  <div class="form-group col-md-6">
    $inputPhone
  </div>
</div>

<div class="form-group">
  $inputMessage
</div>
$btn
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
<h2 class="text-center">$txtTitle</h2>
<div class="row gap-y mt-8">
  $mailer

  <div class="col-lg-5 ml-auto text-center text-lg-left">
    <hr class="d-lg-none">
    <h5>$txtTitleAddress</h5>
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
