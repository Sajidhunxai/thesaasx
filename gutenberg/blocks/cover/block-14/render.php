<?php

function the_block_render_cover_14( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );
$img        = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtSmall = $X['txtSmall'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row h-100">
  <div class="col-lg-8 mx-auto align-self-center">

    <p>$img</p>
    <h1 class="display-4 my-6">$txtTitle</h1>
    <p class="lead-3">$txtText</p>

    <hr class="w-80px">

    <p>
      $btnPrimary
      <br>
      <span class="opacity-70 small-3">$txtSmall</span>
    </p>

  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
