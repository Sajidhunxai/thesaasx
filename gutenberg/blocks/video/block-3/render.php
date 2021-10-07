<?php

function the_block_render_video_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay = thesaasx_render_button( $X['btnPlay'] );

$output = <<< EOD
<div class="text-center mb-7">
  $btnPlay
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
