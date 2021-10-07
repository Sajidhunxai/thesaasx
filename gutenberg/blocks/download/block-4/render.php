<?php

function the_block_render_download_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgApp    = thesaasx_render_image( $X['imgApp'] );
$imgApple  = thesaasx_render_image( $X['imgApple'] );
$imgGoogle = thesaasx_render_image( $X['imgGoogle'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center">
  <div class="col-md-6">
    <h2>$txtTitle</h2>
    <br/>
    <p>$txtText</p>

    <div class="gap-xy-2 mt-7">
      $imgApple
      $imgGoogle
    </div>
  </div>

  <div class="col-md-5 ml-md-auto text-center">
    $imgApp
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
