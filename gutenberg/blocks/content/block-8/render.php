<?php

function the_block_render_content_8( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtText  = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<p>
  %1$s
  <span>%2$s</span>
</p>
EOD;

foreach ( $X['features'] as $feature ) {
  $items .= sprintf( $repeater,
    thesaasx_render_icon( $feature['icon'] ),
    $feature['text']
  );
}


$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-7 mx-auto">
    <h2>$txtTitle</h2>
    <p class="lead">$txtText</p>
    <br>
    $items
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
