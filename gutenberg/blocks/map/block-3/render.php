<?php

function the_block_render_map_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$map = thesaasx_render_googleMap( $X['map'] );

$txtSmall = $X['txtSmall'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row no-gutters">
  <div class="col-md-6">
    $map
  </div>

  <div class="col-10 col-md-4 mx-auto align-self-center py-8">
    <p class="text-uppercase small opacity-50 fw-600 ls-1">$txtSmall</p>
    <h5>$txtTitle</h5>
    <br>
    <p>$txtText</p>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
