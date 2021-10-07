<?php

function thesaasx_render_navbar( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [ 'navbar' ];
$class[] = 'navbar-expand-'. $X['expand'];
$class[] = 'navbar-'. $X['color'];
$class[] = 'navbar-stick-'. $X['colorSticky'];


$class_cont   = [];
$class_cont[] = $X['container'] === '' ? 'container' : 'container-fluid';


$data = [
	'data-navbar'   => $X['mode'],
];


$attrData      = The_Util::get_attr_data( $data );
$attrClass     = The_Util::get_attr_class( $class );
$attrClassCont = The_Util::get_attr_class( $class_cont );


$output = <<< EOD
<nav $attrClass $attrData>
	<div $attrClassCont>
		$children
	</div>
</nav>
EOD;

/* --------------------------------------------------- */

return $output;
}
