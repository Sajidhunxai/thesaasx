<?php

function the_block_render_footer_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$social = thesaasx_render_socialIcons( $X['social'] );
$txtText = $X['txtText'];

$output = <<< EOD
$social
<br>
<p class="small">$txtText</p>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
