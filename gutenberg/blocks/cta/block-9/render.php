<?php

function the_block_render_cta_9( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn  = thesaasx_render_button( $X['btn'] );

$txtText  = $X['txtText'];

$output = <<< EOD
<p class="text-center">
  $btn<br>
  <small class="opacity-80">$txtText</small>
</p>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
