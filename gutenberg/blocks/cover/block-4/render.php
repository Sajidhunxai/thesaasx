<?php

function the_block_render_cover_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary   = thesaasx_render_button( $X['btnPrimary'] );
$btnSecondary = thesaasx_render_button( $X['btnSecondary'] );
$img          = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">
  <div class="col-lg-6">
    <h1>$txtTitle</h1>
    <p class="lead mt-5 mb-8">$txtText</p>
    <p class="gap-xy">
      $btnPrimary
      $btnSecondary
    </p>
  </div>

  <div class="col-lg-5 ml-auto">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
