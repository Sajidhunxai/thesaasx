<?php

function the_block_render_download_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgApp    = thesaasx_render_image( $X['imgApp'] );
$imgApple  = thesaasx_render_image( $X['imgApple'] );
$imgGoogle = thesaasx_render_image( $X['imgGoogle'] );

$output = <<< EOD
<div class="text-center gap-xy-2 my-6">
  $imgApple
  $imgGoogle
</div>

<div class="text-center">
  <br/><br/>
  $imgApp
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
