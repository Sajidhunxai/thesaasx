<?php

function the_block_render_footer_12( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo = thesaasx_render_image( $X['imgLogo'] );
$social = thesaasx_render_socialIcons( $X['social'] );
$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );
$nav1 = thesaasx_render_nav( $X['nav1'] );
$nav2 = thesaasx_render_nav( $X['nav2'] );
$nav3 = thesaasx_render_nav( $X['nav3'] );

$txtTitle1 = $X['txtTitle1'];
$txtTitle2 = $X['txtTitle2'];
$txtTitle3 = $X['txtTitle3'];
$txtText = $X['txtText'];

$output = <<< EOD
<div class="row gap-y">

  <div class="col-md-6 col-xl-4">
    <p>$imgLogo</p>
    <p>$txtText</p>
  </div>

  <div class="col-6 col-md-3 col-xl-2">
    <h6 class="mb-4 mt-1 fw-500">$txtTitle1</h6>
    $nav1
  </div>

  <div class="col-6 col-md-3 col-xl-2">
    <h6 class="mb-4 mt-1 fw-500">$txtTitle2</h6>
    $nav2
  </div>

  <div class="col-6 col-md-6 col-xl-2">
    <h6 class="mb-4 mt-1 fw-500">$txtTitle3</h6>
    $nav3
  </div>

  <div class="col-6 col-md-6 col-xl-2 text-center">
    <p>$btnPrimary</p>
    <br>
    $social
  </div>

</div>
EOD;

$output = thesaasx_render_footer( $X['footer'], $output );

/* --------------------------------------------------- */

return $output;
}
