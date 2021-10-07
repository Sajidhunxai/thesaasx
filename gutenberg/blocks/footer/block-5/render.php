<?php

function the_block_render_footer_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$links = thesaasx_render_navLinks( $X['links'] );
$txtText = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-8 col-lg-6 mx-auto">
    <div class="nav nav-bold nav-uppercase nav-center">
      $links
    </div>
    <hr>
    <p class="text-center">$txtText</p>
  </div>
</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
