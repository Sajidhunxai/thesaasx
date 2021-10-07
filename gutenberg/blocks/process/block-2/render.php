<?php

function the_block_render_process_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items = '';
$repeater = <<< 'EOD'
<li class="timeline-item">
  <h5>%1$s</h5>
  <p class="small-2"><time>%2$s</time></p>
  <p>%3$s</p>
  <p>%4$s</p>
</li>
EOD;

foreach ( $X['steps'] as $step ) {
  $items .= sprintf( $repeater,
    $step['title'],
    $step['date'],
    thesaasx_render_image( $step['img'] ),
    $step['text']
  );
}


$output = <<< EOD
<div class="row">
  <div class="col-lg-8 mx-auto">

    <ol class="timeline">
      $items
    </ol>

  </div>
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
