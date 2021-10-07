<?php

function the_block_render_pricing_6( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$link = thesaasx_render_readMore( $X['link'] );

$txtTitle = $X['txtTitle'];
$txtText = $X['txtText'];

$txtMonthly = $X['txtMonthly'];
$txtYearly  = $X['txtYearly'];

$plans = '';
$yr_plans = '';
$repeater = <<< 'EOD'
<div class="col-md-6">
  <div class="card text-center shadow-1 hover-shadow-9">
    <div class="card-img-top text-white bg-img h-200 d-flex align-items-center" style="background-image: url(%1$s)" data-overlay="1">
      <div class="position-relative w-100">
        <p class="lead-4 text-uppercase fw-600 ls-1 mb-0">%2$s</p>
        <p>%3$s</p>
      </div>
    </div>
    <div class="card-body py-6">
      <p class="lead-7 fw-600 text-dark">
        %4$s<span class="lead-4 align-text-top">%5$s</span>
      </p>
      <p>%6$s</p>
      <br>
      <div>%7$s</div>
    </div>
  </div>
</div>
EOD;

for ($i=1; $i < 3; $i++) {
  $plan = $X['pricing'. $i];
  $btn  = thesaasx_render_button( $X['btn'. $i] );
  $img  = $X['img'. $i];

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $plans .= sprintf( $repeater,
    $img,
    $plan['name'],
    $plan['period'],
    $plan['price'],
    $plan['price99'],
    $plan['text'],
    $btn
  );



  $plan = $X['yr_pricing'. $i];
  $btn  = thesaasx_render_button( $X['yr_btn'. $i] );
  $img  = $X['yr_img'. $i];

  if ( trim( $plan['period'] ) === '' ) {
    $plan['period'] = '&nbsp;';
  }

  $yr_plans .= sprintf( $repeater,
    $img,
    $plan['name'],
    $plan['period'],
    $plan['price'],
    $plan['price99'],
    $plan['text'],
    $btn
  );
}

$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-4">
    <p class="lead-7 text-dark fw-600 lh-2">$txtTitle</p>
    <p class="lead">$txtText</p>
    <p class="fw-400">$link</p>
  </div>

  <div class="col-md-7 ml-auto">
    <div class="row gap-y">
      $plans
    </div>
  </div>
</div>
EOD;


if ( $X['cycle']['visible'] ):
$output = <<< EOD
<div class="row gap-y align-items-center">
  <div class="col-md-4">
    <p class="lead-7 text-dark fw-600 lh-2">$txtTitle</p>

    <ul class="nav nav-tabs-outline justify-content-start my-7">
      <li class="nav-item">
        <a class="nav-link w-150 active" data-toggle="tab" href="#price-mo">$txtMonthly</a>
      </li>
      <li class="nav-item">
        <a class="nav-link w-150" data-toggle="tab" href="#price-yr">$txtYearly</a>
      </li>
    </ul>

    <p class="lead">$txtText</p>
    <p class="fw-400">$link</p>
  </div>


  <div class="col-md-7 ml-auto">
    <div class="tab-content">
      <div class="tab-pane fade show active" id="price-mo">
        <div class="row gap-y">
          $plans
        </div>
      </div>

      <div class="tab-pane fade" id="price-yr">
        <div class="row gap-y">
          $yr_plans
        </div>
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
