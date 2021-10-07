<?php

function the_block_render_review_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-4">
  <div class="card shadow-3">
    <div class="card-body px-6">
      <div class="rating mb-3">
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
        <label class="fa fa-star active"></label>
      </div>

      <p class="text-quoted mb-5">%1$s</p>
      <div class="media align-items-center pb-0">
        %2$s
        <div class="media-body lh-1">
          <div class="fw-400 small-1 mb-1">%3$s</div>
          <small class="text-lighter">%4$s</small>
        </div>
      </div>
    </div>
  </div>
</div>
EOD;

foreach ( $X['reviews'] as $review ) {
  $items .= sprintf( $repeater,
    $review['text'],
    thesaasx_render_image( $review['img'] ),
    $review['name'],
    $review['user']
  );
}

$output = <<< EOD
<div class="row gap-y">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
