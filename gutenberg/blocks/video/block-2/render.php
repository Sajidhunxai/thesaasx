<?php

function the_block_render_video_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$btnPlay  = thesaasx_render_button( $X['btnPlay'] );
$imgCover = thesaasx_render_image( $X['imgCover'] );

$output = <<< EOD
<div class="row">
  <div class="col-md-8 mx-auto">

    <div class="video-btn-wrapper" data-aos="fade-up">
      $imgCover
      $btnPlay
    </div>

  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
