<?php

function the_block_render_team_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgAuthor = thesaasx_render_image( $X['imgAuthor'] );
$social    = thesaasx_render_socialIcons( $X['social'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row">
  <div class="col-lg-5 text-center mx-auto">
    $imgAuthor
    <hr class="d-lg-none my-7">
  </div>

  <div class="col-lg-6 align-self-center text-center text-lg-left">
    <h2 class="fw-200">$txtTitle</h2>
    <br>
    $txtText
    <br>
    $social
    <br>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
