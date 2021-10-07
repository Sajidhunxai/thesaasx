<?php

function the_block_render_footer_9( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo = thesaasx_render_image( $X['imgLogo'] );
$social = thesaasx_render_socialIcons( $X['social'] );
$links1 = thesaasx_render_navLinks( $X['links1'] );
$links2 = thesaasx_render_navLinks( $X['links2'] );
$links3 = thesaasx_render_navLinks( $X['links3'] );

$txtText = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-12">
    <p>$imgLogo</p>
  </div>

  <div class="col-xl-5">
    <p>$txtText</p>
    $social
    <hr class="d-xl-none">
  </div>

  <div class="col-4 col-xl-2 offset-xl-1">
    <div class="nav flex-column">
      $links1
    </div>
  </div>

  <div class="col-4 col-xl-2">
    <div class="nav flex-column">
      $links2
    </div>
  </div>

  <div class="col-4 col-xl-2">
    <div class="nav flex-column">
      $links3
    </div>
  </div>
</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
