<?php

function the_block_render_review_4( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="px-6">
  <blockquote class="blockquote">
    <p class="lead-4">%1$s</p>
    <br>
    <div>%2$s</div>
    <footer>%3$s</footer>
  </blockquote>
</div>
EOD;

foreach ( $X['reviews'] as $review ) {
  $items .= sprintf( $repeater,
    $review['text'],
    thesaasx_render_image( $review['img'] ),
    $review['name']
  );
}

$items = thesaasx_render_slickSlider( $X['slider'], $items );

$output = <<< EOD
$items
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
