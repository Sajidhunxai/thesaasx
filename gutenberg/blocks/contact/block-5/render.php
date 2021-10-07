<?php

function the_block_render_contact_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputMessage  = thesaasx_render_input( $X['inputMessage'] );

$txtTitleAddress = $X['txtTitleAddress'];
$txtTitlePhone = $X['txtTitlePhone'];
$txtTitleEmail = $X['txtTitleEmail'];
$txtAddress = $X['txtAddress'];
$txtPhone = $X['txtPhone'];
$txtEmail = $X['txtEmail'];


$mailer = <<< EOD
<div class="row">
  <div class="col-md-10 mx-auto bg-white p-6 rounded">
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
  </div>
</div>
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
<div class="row gap-y">
  <div class="col-11 col-md-6 mx-auto mx-md-0">
    $mailer
  </div>

  <div class="col-11 col-md-4 mx-auto text-white pt-6">
    <h6>$txtTitleAddress</h6>
    <p>$txtAddress</p>
    <br>
    <h6>$txtTitlePhone</h6>
    <p>$txtPhone</p>
    <br>
    <h6>$txtTitleEmail</h6>
    <p>$txtEmail</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
