<?php

function the_block_render_footer_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$social = thesaasx_render_socialIcons( $X['social'] );
$links = thesaasx_render_navLinks( $X['links'] );

$txtText = $X['txtText'];

$output = <<< EOD
<div class="row align-items-center">

  <div class="col-md-6">
    <div class="nav nav-bold nav-uppercase justify-content-center justify-content-md-end">
      $links
    </div>
  </div>

  <div class="col-md-6 text-center text-md-left mt-5 mt-md-0">
    $social
  </div>

  <div class="col-12 text-center">
    <br>
    <small>$txtText</small>
  </div>

</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
