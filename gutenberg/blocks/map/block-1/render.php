<?php

function the_block_render_map_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$map = thesaasx_render_googleMap( $X['map'] );

$output = <<< EOD
$map
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
