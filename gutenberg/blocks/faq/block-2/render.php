<?php

function the_block_render_faq_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-xl-4">
  <h5>%1$s</h5>
  <p>%2$s</p>
</div>
EOD;

foreach ( $X['faqs'] as $faq ) {
  $items .= sprintf( $repeater,
    $faq['question'],
    $faq['answer']
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
