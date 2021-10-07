<?php

function the_block_render_pricing_2( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];

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
  <div class="pricing-2">
    <h2 class="price"><span class="price-unit">%1$s</span> %2$s</h2>
    <h6 class="plan-name">%3$s</h6>
    <p class="plan-description">%4$s</p>
    <br>
    %5$s
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
    $plan['unit'],
    $plan['price'],
    $plan['name'],
    $plan['text'],
    $btn
  );
}


$output = <<< EOD
<h2 class="text-center">$txtTitle</h2>
<br><br><br>
<div class="row gap-y">
  $plans
</div>
EOD;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
