<?php

function the_block_render_download_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgApp    = thesaasx_render_image( $X['imgApp'] );
$imgApple  = thesaasx_render_image( $X['imgApple'] );
$imgGoogle = thesaasx_render_image( $X['imgGoogle'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-6 text-center">
    $imgApp
  </div>

  <div class="col-md-6 align-self-center">
    <h2>$txtTitle</h2>
    <p>$txtText</p>
    <div class="gap-xy-2 my-6">
      $imgApple
      $imgGoogle
    </div>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
