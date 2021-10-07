<?php

function the_block_render_faq_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$parentId = rand();
$items = '';
$repeater = <<< 'EOD'
<div class="card">
  <h5 class="card-title">
    <a class="collapsed" data-toggle="collapse" href="#collapse-faq-%4$s-%3$s">
      %1$s
    </a>
  </h5>

  <div id="collapse-faq-%4$s-%3$s" class="collapse" data-parent="#accordion-faq-%4$s">
    <div class="card-body">%2$s</div>
  </div>
</div>
EOD;

$i = 0;
foreach ($X['faqs'] as $faq) {
  $i++;
  $items .= sprintf( $repeater,
    $faq['question'],
    $faq['answer'],
    $i,
    $parentId
  );
}


$output = <<< EOD
<div class="row gap-y">
  $items
</div>
EOD;

$output = <<< EOD
<div class="row">
  <div class="col-md-8 mx-auto">

    <div class="accordion accordion-connected accordion-arrow-right" id="accordion-faq-$parentId">
      $items
    </div>
  </div>

</div>
EOD;


$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
