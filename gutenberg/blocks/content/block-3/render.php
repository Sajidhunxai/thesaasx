<?php

function the_block_render_content_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<h2 class="display-4">$txtTitle</h2>
<p class="lead-2 mt-6">$txtText</p>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
