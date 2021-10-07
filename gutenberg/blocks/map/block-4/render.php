<?php

function the_block_render_map_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$map = thesaasx_render_googleMap( $X['map'] );
$social = thesaasx_render_socialIcons( $X['social'] );

$imgBgPlay  = $X['imgBgPlay'];

$txtSmall = $X['txtSmall'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];
$txtTitleFollow = $X['txtTitleFollow'];

$output = <<< EOD
<div class="row no-gutters">
  <div class="col-md-6 align-self-center py-8 bg-img" style="background-image: url($imgBgPlay)" data-overlay="8">
    <div class="row">
      <div class="col-10 col-md-8 mx-auto">
        <p class="text-uppercase small opacity-70 fw-600 ls-1">$txtSmall</p>
        <h5>$txtTitle</h5>
        <br>
        <p>$txtText</p>
        <br>
        <div class="fw-400">$txtTitleFollow</div>
        $social
      </div>
    </div>
  </div>

  <div class="col-md-6">
    $map
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
