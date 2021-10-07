<?php

function the_block_render_contact_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputMessage  = thesaasx_render_input( $X['inputMessage'] );

$txtText = $X['txtText'];
$txtAddress = $X['txtAddress'];
$txtEmail = $X['txtEmail'];
$txtPhone = $X['txtPhone'];
$txtFax = $X['txtFax'];


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



if ( $txtEmail !== '' ) {
$txtEmail = <<< EOD
<div>
  <span class="d-inline-block w-5 text-lighter" title="Email">E:</span>
  <span class="small-1">$txtEmail</span>
</div>
EOD;
}

if ( $txtPhone !== '' ) {
$txtPhone = <<< EOD
<div>
  <span class="d-inline-block w-5 text-lighter" title="Phone">P:</span>
  <span class="small-1">$txtPhone</span>
</div>
EOD;
}

if ( $txtFax !== '' ) {
$txtFax = <<< EOD
<div>
  <span class="d-inline-block w-5 text-lighter" title="Fax">F:</span>
  <span class="small-1">$txtFax</span>
</div>
EOD;
}



$output = <<< EOD
<div class="row gap-y">
  <div class="col-md-6">
    $mailer
  </div>

  <div class="col-md-5 ml-auto">
    <div class="bg-gray h-full p-5">
      $txtText
      <hr class="w-20 my-6">
      <p class="lead">$txtAddress</p>
      $txtEmail
      $txtPhone
      $txtFax
    </div>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
