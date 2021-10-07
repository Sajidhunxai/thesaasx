<?php

function the_block_render_content_10( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btn = thesaasx_render_button( $X['btn'] );

$imgBg  = $X['imgBg'];
$txtSmall = $X['txtSmall'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$colBefore = '<div class="col-md-6 bg-img mh-300" style="background-image: url('. $imgBg .');"></div>';
$colAfter = '';


if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colBefore = '';
  $colAfter = '<div class="col-md-6 bg-img mh-300" style="background-image: url('. $imgBg .');"></div>';
}

$output = <<< EOD
<div class="row no-gutters">
  $colBefore

  <div class="col-10 col-md-4 mx-auto py-8 text-center text-md-left">
    <p class="small-2 text-light">$txtSmall</p>
    <h4>$txtTitle</h4>
    <p>$txtText</p>
    <br>
    $btn
  </div>

  $colAfter
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
