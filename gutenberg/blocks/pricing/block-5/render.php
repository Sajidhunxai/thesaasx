<?php

function the_block_render_pricing_5( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$txtTitle = $X['txtTitle'];
$txtSmall = $X['txtSmall'];
$txtText = $X['txtText'];

$txtMonthly = $X['txtMonthly'];
$txtYearly  = $X['txtYearly'];

$plans = '';
$yr_plans = '';
$repeater = <<< 'EOD'
<div class="card card-body text-center shadow-2 hover-shadow-8 py-6">
  <p class="lead text-dark text-uppercase fw-600 ls-1 mb-0">%1$s</p>
  <p class="text-lighter">%2$s</p>
  <p class="lead-7 fw-600 text-dark">%3$s<span class="lead-4 align-text-top">%4$s</span></p>
  <p>%5$s</p>
  <br>
  <div>%6$s</div>
</div>
EOD;

for ($i=1; $i < 2; $i++) {
  $plan = $X['pricing'. $i];
  $btn  = thesaasx_render_button( $X['btn'. $i] );

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $plans .= sprintf( $repeater,
    $plan['name'],
    $plan['period'],
    $plan['price'],
    $plan['price99'],
    $plan['text'],
    $btn
  );


  $plan = $X['yr_pricing'. $i];
  $btn  = thesaasx_render_button( $X['yr_btn'. $i] );

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $yr_plans .= sprintf( $repeater,
    $plan['name'],
    $plan['period'],
    $plan['price'],
    $plan['price99'],
    $plan['text'],
    $btn
  );
}

$output = <<< EOD
<div class="row align-items-center">
  <div class="col-md-6">
    <p class="text-uppercase text-lighter fw-400 ls-2">$txtSmall</p>
    <h2 class="fw-200 mb-6">$txtTitle</h2>
    <p>$txtText</p>
  </div>

  <div class="col-md-4 mx-auto mt-7 mt-md-0">
    $plans
  </div>
</div>
EOD;


if ( $X['cycle']['visible'] ):

$output = <<< EOD
<div class="row align-items-center">
  <div class="col-md-6">
    <p class="text-uppercase text-lighter fw-400 ls-2">$txtSmall</p>
    <h2 class="fw-200 mb-6">$txtTitle</h2>
    <p>$txtText</p>

    <ul class="nav nav-tabs-outline justify-content-start mt-7">
      <li class="nav-item">
        <a class="nav-link w-150 active" data-toggle="tab" href="#price-mo">$txtMonthly</a>
      </li>
      <li class="nav-item">
        <a class="nav-link w-150" data-toggle="tab" href="#price-yr">$txtYearly</a>
      </li>
    </ul>
  </div>

  <div class="col-md-4 mx-auto mt-7 mt-md-0">
    <div class="tab-content">
      <div class="tab-pane fade show active" id="price-mo">
        $plans
      </div>

      <div class="tab-pane fade" id="price-yr">
        $yr_plans
      </div>
    </div>
  </div>

</div>
EOD;

endif;


$output = thesaasx_render_section( $X['section'], $output );

/* --------------------------------------------------- */

return $output;
}
