<?php

function the_block_render_feature_14( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$link = thesaasx_render_readMore( $X['link'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];


$colBefore = '<div class="col-md-4 mx-auto text-center">'. $img .'</div>';
$colAfter = '';


if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colBefore = '';
  $colAfter = '<div class="col-md-4 mx-auto text-center">'. $img .'</div>';
}


$output = <<< EOD
<div class="row gap-y align-items-center">
  $colBefore

  <div class="col-md-4 mx-auto">
    <h3>$txtTitle</h3>
    <br>
    <p>$txtText</p>
    $link
  </div>

  $colAfter
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
