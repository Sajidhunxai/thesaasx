<?php

function the_block_render_content_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img      = thesaasx_render_image( $X['img'] );
$txtSmall = $X['txtSmall'];
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$colClass = "col-lg-6 text-center text-lg-right";
$colAfter = '<div class="col-lg-6">'. $img .'</div>';
$colBefore = '';


if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colClass = "col-lg-6 text-center text-lg-left";
  $colAfter = '';
  $colBefore = '<div class="col-lg-6">'. $img .'</div>';
}

$output = <<< EOD
<div class="row gap-y align-items-center">
  $colBefore

  <div class="$colClass">
    <p class="small-2 text-uppercase text-lightest fw-500 ls-1">$txtSmall</p>
    <h3 class="fw-500">$txtTitle</h3>
    <br>
    <p>$txtText</p>
  </div>

  $colAfter
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
