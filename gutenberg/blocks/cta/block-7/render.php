<?php

function the_block_render_cta_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn  = thesaasx_render_button( $X['btn'] );

$txtText  = $X['txtText'];

$output = <<< EOD
<h5 class="lead-5 mb-8 fw-200">$txtText</h5>
<p>$btn</p>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
