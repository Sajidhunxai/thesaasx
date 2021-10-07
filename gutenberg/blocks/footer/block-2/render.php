<?php

function the_block_render_footer_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo = thesaasx_render_image( $X['imgLogo'] );
$links = thesaasx_render_navLinks( $X['links'] );
$txtText = $X['txtText'];

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-3 text-center text-md-left">
    $imgLogo
  </div>

  <div class="col-md-6">
    <div class="nav nav-center">
      $links
    </div>
  </div>

  <div class="col-md-3 text-center text-md-right">
    <small>$txtText</small>
  </div>
</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
