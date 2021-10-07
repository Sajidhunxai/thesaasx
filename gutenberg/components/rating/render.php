<?php

function thesaasx_render_rating( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [];
$class[] = 'rating';
$class[] = $X['class'];


$attrClass = The_Util::get_attr_class( $class );

$stars = [];
for ($i=0; $i < 5; $i++) { 
	$icon = 'fa-star-o';
	if ( $X['value'] >= $i+1 ) {
		$icon = 'fa-star';
	}
	else if ( $X['value'] === $i+0.5 ) {
		$icon = 'fa-star-half-o';
	}

	$stars[$i] = $icon;
}

$rating = '';
foreach ($stars as $star) {
	$rating .= '<label class="fa '. $star .'"></label>';
}

$output = <<< EOD
<div $attrClass >$rating</div>
EOD;

/* --------------------------------------------------- */

return $output;
}
