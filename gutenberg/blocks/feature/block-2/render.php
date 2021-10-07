<?php

function the_block_render_feature_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$btn = thesaasx_render_button( $X['btn'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-md-6 align-self-center text-center text-md-left">
    <h2>$txtTitle</h2>
    <br>
    <p>$txtText</p>
    <br>
    $btn
  </div>

  <div class="col-md-5 mx-auto text-center mt-8 mt-md-0">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
