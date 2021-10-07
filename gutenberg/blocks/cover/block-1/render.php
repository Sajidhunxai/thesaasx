<?php

function the_block_render_cover_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );
$img        = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">
  <div class="col-md-8 mx-auto">
    <h1>$txtTitle</h1>
    <p class="lead mt-4 mb-7">$txtText</p>
    $btnPrimary
  </div>

  <div class="col-md-8 mx-auto align-self-end">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
