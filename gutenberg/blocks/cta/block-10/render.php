<?php

function the_block_render_cta_10( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn  = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];

$output = <<< EOD
<h2 class="display-4 mb-7">$txtTitle</h2>
$btn
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
