<?php

function the_block_render_featuretxt_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$iconL = thesaasx_render_icon( $X['iconL'] );
$iconR = thesaasx_render_icon( $X['iconR'] );

$titleL = $X['titleL'];
$titleR = $X['titleR'];

$textL = $X['textL'];
$textR = $X['textR'];

$linkL = $X['linkL'];
$linkR = $X['linkR'];


$output = <<< EOD
<div class="row no-gap text-center">

  <div class="col-md-6 bg-gray px-5 py-6 p-md-8">
    <p class="mb-6">$iconL</p>
    <h4 class="mb-5">$titleL</h4>
    <p>$textL</p>
    <br>
    <p>$linkL</p>
  </div>


  <div class="col-md-6 px-5 py-6 p-md-8">
    <p class="mb-6">$iconR</p>
    <h4 class="mb-5">$titleR</h4>
    <p>$textR</p>
    <br>
    <p>$linkR</p>
  </div>

</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
