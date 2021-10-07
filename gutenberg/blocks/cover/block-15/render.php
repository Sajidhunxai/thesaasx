<?php

function the_block_render_cover_15( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center py-9">
  <div class="col-md-6">
    <h1 class="display-4">$txtTitle</h1>
    <br>
    <p class="lead-3">$txtText</p>
    <br>
    $btnPrimary
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
