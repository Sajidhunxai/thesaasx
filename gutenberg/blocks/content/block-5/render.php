<?php

function the_block_render_content_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-8 mx-auto">
    <h1>$txtTitle</h1>
    <p class="lead-2 mt-6">$txtText</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
