<?php

function the_block_render_pricing_1( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtMonthly = $X['txtMonthly'];
$txtYearly  = $X['txtYearly'];

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


$plans_mo = '';
$plans_yr = '';
$repeater = <<< 'EOD'
<div class="col-md-6 col-lg-4 mx-auto">
  <div class="pricing-1">
    <p class="plan-name">%1$s</p>
    <br>
    <h2 class="price">
      <span class="price-unit">%2$s</span>
      <span>%3$s</span>
    </h2>
    <p class="small text-lighter">%4$s</p>
    <div class="small text-muted">%5$s</div>
    <br>
    <p class="text-center py-3">%6$s</p>
  </div>
</div>
EOD;


foreach ($items_mo as $key => $item) {
  $plan = $item['plan'];
  $btn  = thesaasx_render_button( $item['btn'] );

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $plans_mo .= sprintf( $repeater,
    $plan['name'],
    $plan['unit'],
    $plan['price'],
    $plan['period'],
    $plan['text'],
    $btn
  );
}


foreach ($items_yr as $key => $item) {
  $plan = $item['plan'];
  $btn  = thesaasx_render_button( $item['btn'] );

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $plans_yr .= sprintf( $repeater,
    $plan['name'],
    $plan['unit'],
    $plan['price'],
    $plan['period'],
    $plan['text'],
    $btn
  );
}

$output = <<< EOD
<div class="row gap-y text-center">
  $plans_mo
</div>
EOD;

if ( $X['cycle']['visible'] ):
$output = <<< EOD

<ul class="nav nav-tabs-outline my-7">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#price-mo" style="min-width: 150px">$txtMonthly</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#price-yr" style="min-width: 150px">$txtYearly</a>
  </li>
</ul>


<div class="tab-content">
  <div class="tab-pane fade show active" id="price-mo">
    <div class="row gap-y text-center">
      $plans_mo
    </div>
  </div>


  <div class="tab-pane fade" id="price-yr">
    <div class="row gap-y text-center">
      $plans_yr
    </div>
  </div>
</div>
EOD;
endif;

$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
