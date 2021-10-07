<?php

function the_block_render_feature_16( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$link = thesaasx_render_readMore( $X['link'] );

$txtTitle = $X['txtTitle'];
$txtLead = $X['txtLead'];
$txtText = $X['txtText'];


$colBefore = '';
$colAfter = '<div class="col-md-5 ml-auto text-center">'. $img .'</div>';


if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colBefore = '<div class="col-md-5 mr-auto text-center">'. $img .'</div>';
  $colAfter = '';
}


$output = <<< EOD
<div class="row gap-y align-items-center">
  $colBefore

  <div class="col-md-5">
    <h2>$txtTitle</h2>
    <p class="lead">$txtLead</p>
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
