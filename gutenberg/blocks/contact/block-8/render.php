<?php

function the_block_render_contact_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn        = thesaasx_render_button( $X['btn'] );

$inputName  = thesaasx_render_input( $X['inputName'] );
$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$inputSubject = thesaasx_render_input( $X['inputSubject'] );
$inputCompany  = thesaasx_render_input( $X['inputCompany'] );
$inputMessage  = thesaasx_render_input( $X['inputMessage'] );


$mailer = <<< EOD
<div class="form-row">
	<div class="form-group col-sm-6 col-xl-3">
	  $inputName
	</div>

	<div class="form-group col-sm-6 col-xl-3">
	  $inputEmail
	</div>

	<div class="form-group col-sm-6 col-xl-3">
	  $inputSubject
	</div>

	<div class="form-group col-sm-6 col-xl-3">
	  $inputCompany
	</div>


	<div class="form-group col-12">
	  $inputMessage
	</div>

	<div class="col-12 text-center">
	  $btn
	</div>
</div>
EOD;
$mailer = thesaasx_render_mailer( $X['mailer'], $mailer );


$output = <<< EOD
$mailer
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
