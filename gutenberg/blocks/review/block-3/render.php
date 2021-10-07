<?php

function the_block_render_review_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$imgAvatar = thesaasx_render_image( $X['imgAvatar'] );

$txtName = $X['txtName'];
$txtText = $X['txtText'];


$output = <<< EOD
<blockquote class="blockquote">
  <p class="lead-4">$txtText</p>
  <br>
  <div>$imgAvatar</div>
  <footer>$txtName</footer>
</blockquote>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
