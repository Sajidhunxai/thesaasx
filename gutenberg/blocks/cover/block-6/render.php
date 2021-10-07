<?php

function the_block_render_cover_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary   = thesaasx_render_button( $X['btnPrimary'] );
$btnSecondary = thesaasx_render_button( $X['btnSecondary'] );
$btnPlay      = thesaasx_render_button( $X['btnPlay'] );
$img          = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">
  <div class="col-lg-5">
    <h1 class="display-4">$txtTitle</h1>
    <p class="lead mt-5">$txtText</p>
    <hr class="w-10 ml-0 my-7">
    <p class="gap-xy">
      $btnPrimary
      $btnSecondary
    </p>
  </div>

  <div class="col-lg-5 ml-auto">
    <div class="video-btn-wrapper mt-8 mt-lg-0">
      $img
      $btnPlay
    </div>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
