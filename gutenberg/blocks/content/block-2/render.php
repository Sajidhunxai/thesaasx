<?php

function the_block_render_content_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgBgFounder  = $X['imgBgFounder'];
$txtTitle = $X['txtTitle'];
$txtLead  = $X['txtLead'];
$txtText  = $X['txtText'];

$output = <<< EOD
<div class="row no-gutters">
  <div class="col-md-4 bg-img" style="background-image: url($imgBgFounder); min-height: 200px;"></div>

  <div class="col-md-8 p-6 p-md-8">
    <h4>$txtTitle</h4>
    <p class="lead">$txtLead</p>
    $txtText
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
