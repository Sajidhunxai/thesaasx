<?php

function thesaasx_render_socialIcons( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [ 'social' ];
$class[] = $X['class'];

$icons = '';
foreach ( $X['icons'] as $key => $value ) {
	if ( $value === '' ) {
		continue;
	}

	$icon = esc_attr( $key );
	$link = esc_url( $value );

	if ( $icon == 'email' ) {
		$icon = 'envelope-o';
		$link = $value;
		if ( stripos( $link, 'mailto:' ) === false ) {
			$link = 'mailto:'. $link;
		}
	}
	
	$icons .= '<a class="social-'. $icon .'" href="'. $link .'" target="_blank"><i class="fa fa-'. $icon .'"></i></a>';
}

$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<div $attrClass>
	$icons
</div>
EOD;

/* --------------------------------------------------- */

return $output;
}
