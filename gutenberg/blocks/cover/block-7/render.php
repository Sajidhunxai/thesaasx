<?php

function the_block_render_cover_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary   = thesaasx_render_button( $X['btnPrimary'] );
$btnPlay      = thesaasx_render_button( $X['btnPlay'] );

$txtLength = $X['txtLength'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center h-100">

  <div class="col-md-8 mx-auto text-center">
    <h1>$txtTitle</h1>
    <p class="lead mt-5">$txtText</p>
    <hr class="w-10 my-7">
    $btnPrimary
  </div>

  <div class="w-100"></div>

  <div class="col-auto align-self-end mx-auto mt-8 mt-lg-0">
    <div class="media align-items-center">
      <div class="mr-4">
        $btnPlay
      </div>
      <div class="media-body opacity-60">$txtLength</div>
    </div>
  </div>

</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
