<?php

function the_block_render_footer_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$social = thesaasx_render_socialIcons( $X['social'] );
$txtText = $X['txtText'];

$output = <<< EOD
<div class="row gap-y align-items-center">

  <div class="col-md-6 text-center text-md-left">
    <small>$txtText</small>
  </div>

  <div class="col-md-6 text-center text-md-right">
    $social
  </div>

</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
