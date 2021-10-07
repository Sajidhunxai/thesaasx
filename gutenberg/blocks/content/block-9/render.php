<?php

function the_block_render_content_9( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img      = thesaasx_render_image( $X['img'] );
$btn      = thesaasx_render_button( $X['btn'] );
$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];


$colAfter = '<div class="col-lg-5 mx-auto">'. $img .'</div>';
$colBefore = '';


if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colAfter = '';
  $colBefore = '<div class="col-lg-5 mx-auto">'. $img .'</div>';
}

$output = <<< EOD
<div class="row gap-y align-items-center">
  $colBefore

  <div class="col-lg-6 text-center text-lg-left">
    <h3>$txtTitle</h3>
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
