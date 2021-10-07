<?php

function the_block_render_download_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgLogo   = thesaasx_render_image( $X['imgLogo'] );
$imgApple  = thesaasx_render_image( $X['imgApple'] );
$imgGoogle = thesaasx_render_image( $X['imgGoogle'] );

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];
$txtRate  = $X['txtRate'];

$output = <<< EOD
<div class="row">
  <div class="col-md-8 col-xl-6 mx-auto">

    <div class="section-dialog bg-dark text-white text-center" data-aos="fade-in" data-aos-duration="700">
      <p>$imgLogo</p>
      <br>
      <h2 class="mb-5">$txtTitle</h2>
      <p>$txtText</p>

      <hr class="w-10">

      <div class="rating">
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
      </div>
      <p><small>$txtRate</small></p>

      <div class="text-center gap-xy-2 mt-6">
        $imgApple
        $imgGoogle
      </div>

    </div>

  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
