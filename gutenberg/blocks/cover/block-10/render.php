<?php

function the_block_render_cover_10( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row h-100">
  <div class="col-md-7 col-xl-5 mx-auto align-self-center">
    <h1 class="display-1 fw-600 ls-3">$txtTitle</h1>
    <p class="lead-3 mx-auto mt-6 mb-7">$txtText</p>
    <hr class="w-80px mb-7">
    $btnPrimary
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
