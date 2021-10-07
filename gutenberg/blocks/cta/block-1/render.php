<?php

function the_block_render_cta_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn  = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<h2 class="mb-6 fw-500">$txtTitle</h2>
<p class="lead text-muted">$txtText</p>
<hr class="w-5 my-7">
$btn
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
