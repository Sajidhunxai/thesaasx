<?php

function the_block_render_content_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtLead = $X['txtLead'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-8 mx-auto">
    <h2>$txtTitle</h2>
    <p class="lead">$txtLead</p>
    $txtText
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
