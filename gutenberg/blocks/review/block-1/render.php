<?php

function the_block_render_review_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-4">
  <blockquote class="blockquote">
    <div>%1$s</div>
    <br>
    <p class="small">%2$s</p>
    <footer>%3$s</footer>
  </blockquote>
</div>
EOD;

foreach ( $X['reviews'] as $review ) {
  $items .= sprintf( $repeater,
    thesaasx_render_image( $review['img'] ),
    $review['text'],
    $review['name']
  );
}

$output = <<< EOD
<div class="row gap-y text-center">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
