<?php

function the_block_render_footer_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo = thesaasx_render_image( $X['imgLogo'] );
$social = thesaasx_render_socialIcons( $X['social'] );
$links = thesaasx_render_navLinks( $X['links'] );


$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-3 text-center text-md-left">
    $imgLogo
  </div>

  <div class="col-md-6">
    <div class="nav nav-bold nav-uppercase nav-center">
      $links
    </div>
  </div>

  <div class="col-md-3 text-center text-md-right">
    $social
  </div>
</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
