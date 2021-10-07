<?php

function the_block_render_cover_13( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtSmall = $X['txtSmall'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-6">
    <h1 class="fw-200 mb-6">$txtTitle</h1>
    <p class="lead-2">$txtText</p>
    <hr class="w-50px ml-0">
    <p class="small-1">$txtSmall</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
