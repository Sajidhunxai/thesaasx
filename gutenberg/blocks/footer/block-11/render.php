<?php

function the_block_render_footer_11( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo = thesaasx_render_image( $X['imgLogo'] );
$social = thesaasx_render_socialIcons( $X['social'] );
$btnPrimary = thesaasx_render_button( $X['btnPrimary'] );
$links1 = thesaasx_render_navLinks( $X['links1'] );
$links2 = thesaasx_render_navLinks( $X['links2'] );
$links3 = thesaasx_render_navLinks( $X['links3'] );

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
    <div class="nav flex-column">
      $links1
    </div>
  </div>

  <div class="col-6 col-md-3 col-xl-2">
    <h6 class="mb-4 mt-1 fw-500">$txtTitle2</h6>
    <div class="nav flex-column">
      $links2
    </div>
  </div>

  <div class="col-6 col-md-6 col-xl-2">
    <h6 class="mb-4 mt-1 fw-500">$txtTitle3</h6>
    <div class="nav flex-column">
      $links3
    </div>
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
