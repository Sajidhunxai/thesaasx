<?php

function the_block_render_content_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">
  <div class="col-md-7 mx-auto">
    <h1>$txtTitle</h1>
    <p class="lead-3">$txtText</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
