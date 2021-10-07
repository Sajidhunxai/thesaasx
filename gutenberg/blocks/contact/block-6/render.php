<?php

function the_block_render_contact_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputCompany  = thesaasx_render_input( $X['inputCompany'] );

$txtTitle = $X['txtTitle'];


$mailer = <<< EOD
<div class="form-row">
	<input type="hidden" name="message" value="Empty message. Poked from Contact Block #6" />
	<div class="form-group col-sm-6 col-lg-3">
	  $inputName
	</div>

	<div class="form-group col-sm-6 col-lg-3">
	  $inputEmail
	</div>

	<div class="form-group col-sm-6 col-lg-3">
	  $inputCompany
	</div>

	<div class="form-group col-sm-6 col-lg-3">
	  $btn
	</div>
</div>
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
<h2 class="text-center mb-7">$txtTitle</h2>
$mailer
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
