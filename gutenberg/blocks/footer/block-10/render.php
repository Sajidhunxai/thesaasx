<?php

function the_block_render_footer_10( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );
$btnSecondary = thesaasx_render_button( $X['btnSecondary'] );
$links1 = thesaasx_render_navLinks( $X['links1'] );
$links2 = thesaasx_render_navLinks( $X['links2'] );

$txtTitle1 = $X['txtTitle1'];
$txtTitle2 = $X['txtTitle2'];
$txtTitle3 = $X['txtTitle3'];
$txtTitle4 = $X['txtTitle4'];
$txtText1 = $X['txtText1'];
$txtText2 = $X['txtText2'];
$txtSmall = $X['txtSmall'];

$output = <<< EOD
<div class="row gap-y">

  <div class="col-xl-4 order-md-last">
    <h6 class="mb-4 fw-500">$txtTitle1</h6>
    <p>$txtText1</p>
    $btnPrimary
    $btnSecondary
  </div>

  <div class="col-6 col-md-4 col-xl-2">
    <h6 class="mb-4 fw-500">$txtTitle2</h6>
    <div class="nav flex-column">
      $links1
    </div>
  </div>

  <div class="col-6 col-md-4 col-xl-2">
    <h6 class="mb-4 fw-500">$txtTitle3</h6>
    <div class="nav flex-column">
      $links2
    </div>
  </div>

  <div class="col-xl-4 order-md-first">
    <h6 class="mb-4 fw-500">$txtTitle4</h6>
    <p>$txtText2</p>
    <small class="opacity-70">$txtSmall</small>
  </div>

</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
