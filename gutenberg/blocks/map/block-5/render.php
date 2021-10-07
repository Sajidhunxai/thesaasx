<?php

function the_block_render_map_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$map = thesaasx_render_googleMap( $X['map'] );
$social = thesaasx_render_socialIcons( $X['social'] );

$txtSmall = $X['txtSmall'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];
$txtTitleFollow = $X['txtTitleFollow'];

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-5">
    <p class="text-uppercase small opacity-70 fw-600 ls-1">$txtSmall</p>
    <h5>$txtTitle</h5>
    <br>
    <p>$txtText</p>
    <br>
    <h6>$txtTitleFollow</h6>
    $social
  </div>

  <div class="col-md-7">
    $map
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
