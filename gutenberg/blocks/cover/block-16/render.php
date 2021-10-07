<?php

function the_block_render_cover_16( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );
$img        = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">
  <div class="col-md-5 mr-auto">
    <h1>$txtTitle</h1>
    <br>
    <p class="lead-2">$txtText</p>
    <br>
    $btnPrimary
  </div>

  <div class="col-md-6">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
