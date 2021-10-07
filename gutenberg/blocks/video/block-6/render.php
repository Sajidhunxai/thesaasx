<?php

function the_block_render_video_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay  = thesaasx_render_button( $X['btnPlay'] );
$imgCover = thesaasx_render_image( $X['imgCover'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];
$txtPlay  = $X['txtPlay'];

$txtPlayUrl = $X['btnPlay']['url'];


$colBefore = '';
$colAfter = '<div class="col-md-6 ml-auto">'. $imgCover .'</div>';


if ( isset($X['section']['switchSides']) && $X['section']['switchSides'] == true ) {
  $colBefore = '<div class="col-md-6 mr-auto">'. $imgCover .'</div>';
  $colAfter = '';
}


$output = <<< EOD
<div class="row gap-y align-items-center">
  $colBefore


  <div class="col-md-5 text-center text-md-left">
    <h2>$txtTitle</h2>
    <p>$txtText</p>

    <div class="media align-items-center mt-7 text-left">
      <div class="mr-4">
        $btnPlay
      </div>
      <div class="media-body">
        <a class="small text-default text-uppercase mb-0" href="$txtPlayUrl" data-provide="lightbox"><strong>$txtPlay</strong></a>
      </div>
    </div>
  </div>


  $colAfter
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
