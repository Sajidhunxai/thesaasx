<?php

function the_block_render_cover_11( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary   = thesaasx_render_button( $X['btnPrimary'] );
$btnSecondary = thesaasx_render_button( $X['btnSecondary'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row h-100">
  <div class="col-lg-8 mx-auto align-self-center">
    <h1 class="display-3 fw-500">$txtTitle</h1>
    <p class="lead-2 text-white mt-6 mb-8">$txtText</p>
    <p class="gap-xy">
      $btnPrimary
      $btnSecondary
    </p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
