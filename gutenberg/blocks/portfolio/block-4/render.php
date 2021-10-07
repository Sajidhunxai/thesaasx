<?php

function the_block_render_portfolio_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$img = thesaasx_render_image( $X['img'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$items = '';
$repeater = <<< 'EOD'
<li>
  <strong>%1$s</strong>
  <span>%2$s</span>
</li>
EOD;

foreach ( $X['details'] as $detail ) {
  $items .= sprintf( $repeater,
    $detail['title'],
    $detail['text']
  );
}


$output = <<< EOD
<div class="row">
  <div class="col-md-8 mb-6 mb-md-0">
    $img
  </div>

  <div class="col-md-4">
    <h5>$txtTitle</h5>
    <p>$txtText</p>

    <ul class="project-detail mt-7">
      $items
    </ul>
  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
