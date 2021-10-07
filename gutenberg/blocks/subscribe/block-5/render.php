<?php

function the_block_render_subscribe_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$inputEmail = thesaasx_render_input( $X['inputEmail'] );
$btn        = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$form = <<< EOD
<div class="input-group">
  $inputEmail
  <span class="input-group-append">
    $btn
  </span>
</div>
EOD;
$form = thesaasx_render_form( $X['form'], $form );


$output = <<< EOD
<div class="row">
  <div class="col-md-8 col-xl-6 mx-auto">

    <div class="section-dialog bg-primary text-white">
      <h4>$txtTitle</h4>
      <br><br>
      <p class="text-right small pr-5">$txtText</p>
      $form
    </div>

  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
