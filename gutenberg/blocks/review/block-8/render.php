<?php

function the_block_render_review_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtName = $X['txtName'];
$txtText = $X['txtText'];
$txtTitle = $X['txtTitle'];


$output = <<< EOD
<div class="row">
  <div class="col-10 col-md-7 col-xl-5">
    <div class="section-dialog shadow-4">
      <h5 class="fw-500">$txtTitle</h5>
      <blockquote class="blockquote text-left lead-1 mb-0 mt-5">
        <p>$txtText</p>
        <footer>$txtName</footer>
      </blockquote>
    </div>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
