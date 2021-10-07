<?php

function the_block_render_feature_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img1 = thesaasx_render_image( $X['img1'] );
$img2 = thesaasx_render_image( $X['img2'] );
$img3 = thesaasx_render_image( $X['img3'] );

$num1 = $X['num1'];
$txt1 = $X['txt1'];

$num2 = $X['num2'];
$txt2 = $X['txt2'];

$num3 = $X['num3'];
$txt3 = $X['txt3'];

$output = <<< EOD
<div class="row gap-y text-center">

  <div class="col-md-4 d-flex flex-column">
    <div class="mb-7">
      <span class="lead-7">$num1</span><br>
      <p>$txt1</p>
    </div>
    <div class="px-5 mt-auto">
      $img1
    </div>
  </div>

  <div class="col-md-4 d-flex flex-column">
    <div class="mb-7">
      <span class="lead-7">$num2</span><br>
      <p>$txt2</p>
    </div>
    <div class="mt-auto">
      $img2
    </div>
  </div>

  <div class="col-md-4 d-flex flex-column">
    <div class="mb-7">
      <span class="lead-7">$num3</span><br>
      <p>$txt3</p>
    </div>
    <div class="px-5 mt-auto">
      $img3
    </div>
  </div>

</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
