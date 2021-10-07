<?php

function the_block_render_pricing_3( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */


$items_mo = $X['items_mo'];
$items_yr = $X['items_yr'];


if (empty($items_mo)) {
  $items_mo = [
    [
      "btn"  => $X['btn1'],
      "plan" => $X['pricing1'],
    ],
    [
      "btn"  => $X['btn2'],
      "plan" => $X['pricing2'],
    ],
    [
      "btn"  => $X['btn3'],
      "plan" => $X['pricing3'],
    ]
  ];
}

if (empty($items_yr)) {
  $items_yr = [
    [
      "btn"  => $X['yr_btn1'],
      "plan" => $X['yr_pricing1'],
    ],
    [
      "btn"  => $X['yr_btn2'],
      "plan" => $X['yr_pricing2'],
    ],
    [
      "btn"  => $X['yr_btn3'],
      "plan" => $X['yr_pricing3'],
    ]
  ];
}


$plans = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-lg-4 mx-auto">
  <div class="pricing-3">
    <h6 class="plan-name">%1$s</h6>
    <h2 class="price">%2$s</h2>
    <div>%3$s</div>
    <br>
    %4$s
  </div>
</div>
EOD;


foreach ($items_mo as $key => $item) {
  $plan = $item['plan'];
  $btn  = thesaasx_render_button( $item['btn'] );

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $plans .= sprintf( $repeater,
    $plan['name'],
    $plan['price'],
    $plan['text'],
    $btn
  );
}


$output = <<< EOD
<div class="row gap-y">
  $plans
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
