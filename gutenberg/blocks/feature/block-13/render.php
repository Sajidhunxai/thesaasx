<?php

function the_block_render_feature_13( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );
$avatar = thesaasx_render_image( $X['avatar'] );
$stars = thesaasx_render_rating( $X['stars'] );

$txtQuote = $X['txtQuote'];
$txtName = $X['txtName'];
$txtUser = $X['txtUser'];

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];


$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-lg-4 mx-auto">
    <h2>$txtTitle</h2>
    <p class="lead">$txtText</p>

    $stars

    <p class="text-quoted">$txtQuote</p>
    <div class="media align-items-center">
      $avatar
      <div class="media-body lh-1">
        <h6 class="mb-0">$txtName</h6>
        <small>$txtUser</small>
      </div>
    </div>
  </div>

  <div class="col-lg-6 mt-7 mt-lg-0">
    $img
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
