<?php

function the_block_render_footer_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo = thesaasx_render_image( $X['imgLogo'] );
$social = thesaasx_render_socialIcons( $X['social'] );
$links = thesaasx_render_navLinks( $X['links'] );

$txtText = $X['txtText'];

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-3 text-center text-md-left">
    $imgLogo
  </div>

  <div class="col-md-9">
    <div class="nav nav-bold nav-uppercase justify-content-center justify-content-md-end">
      $links
    </div>
  </div>

  <div class="col-12">
    <hr class="my-0">
  </div>

  <div class="col-md-3 text-center text-md-left">
    <small>$txtText</small>
  </div>

  <div class="col-md-9 text-center text-md-right">
    $social
  </div>
</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
