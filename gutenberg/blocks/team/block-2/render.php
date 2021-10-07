<?php

function the_block_render_team_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$items = '';
$repeater = <<< 'EOD'
<div class="col-md-4 team-2">
  %1$s
  <h5>%2$s</h5>
  <small>%3$s</small>
  <p>%4$s</p>
  %5$s
</div>
EOD;

foreach ( $X['team'] as $people ) {
  $items .= sprintf( $repeater,
    thesaasx_render_image( $people['img'] ),
    $people['name'],
    $people['position'],
    $people['about'],
    thesaasx_render_socialIcons( $people['social'] )
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
