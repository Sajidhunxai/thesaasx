<?php

function the_block_render_content_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtLead   = $X['txtLead'];
$txtTitle1 = $X['txtTitle1'];
$txtTitle2 = $X['txtTitle2'];
$txtText1  = $X['txtText1'];
$txtText2  = $X['txtText2'];

$output = <<< EOD
<div class="row gap-y">
  <div class="col-md-3 mr-md-auto">
    <p class="lead-4 text-right">$txtLead</p>
  </div>

  <div class="col-md-4">
    <h6>$txtTitle1</h6>
    <p>$txtText1</p>
  </div>

  <div class="col-md-4">
    <h6>$txtTitle2</h6>
    <p>$txtText2</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
