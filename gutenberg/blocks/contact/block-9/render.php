<?php

function the_block_render_contact_9( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<div class="col-lg-4">
  <div class="card border p-5">
    <h5 class="mb-4">%1$s</h5>
    <p class="small-1">%2$s</p>
    <div>%3$s</div>
  </div>
</div>
EOD;

foreach ( $X['cards'] as $card ) {
  $items .= sprintf( $repeater,
    $card['title'],
    $card['text'],
    $card['link']
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
