<?php

function the_block_render_footer_7( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$social = thesaasx_render_socialIcons( $X['social'] );
$links = thesaasx_render_navLinks( $X['links'] );

$txtText = $X['txtText'];

$output = <<< EOD
$social
<br>
<div class="nav nav-bolder nav-uppercase nav-center">
  $links
</div>
<br>
<small>$txtText</small>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
