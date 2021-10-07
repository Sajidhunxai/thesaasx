<?php

function the_block_render_team_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-6 team-3">
  <span class="team-img">%1$s</span>
  <div class="team-body">
    <h5>%2$s</h5>
    <small>%3$s</small>
    <p class="d-none d-lg-block">%4$s</p>
  </div>
</div>
EOD;

foreach ( $X['team'] as $people ) {
  $items .= sprintf( $repeater,
    thesaasx_render_image( $people['img'] ),
    $people['name'],
    $people['position'],
    $people['about']
  );
}

$output = <<< EOD
<div class="row gap-y gap-5">
  $items
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
