<?php

function thesaasx_render_footer( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$BG  = $X['background'];

$class = [ 'footer' ];
$class[] = $X['textWhite'] ?  'text-white' : '';
$class[] = $X['borderTop'] ?  '' : 'bt-0';
$class[] = $BG['type'] == 'image'  ?  'bg-img' : '';
$class[] = $BG['imageStyle'] == 'fixed'  ?  'bg-fixed' : '';
$class[] = $X['paddingTop'];
$class[] = $X['paddingBottom'];
$class[] = $X['class'];


$class_cont   = [];
$class_cont[] = $X['container'] === '' ? 'container' : 'container-'. $X['container'];


$styles = [
  'background-color' => $BG['color'],
];


$data = [
  'id' => $X['id'],
];

switch ( $BG['type'] ) {
  case 'color':

    break;

  case 'image':
    if ( $BG['imageStyle'] == 'parallax' ) {
      $data['data-parallax'] = $BG['image'];
    }
    else {
      $styles['background-image'] = 'url('. $BG['image'] .')';
    }
    break;
}


$el_particles = thesaasx_render_section_particle( $X['particles'] );
$el_overlay   = thesaasx_render_section_overlay( $X['overlay'] );


$attrData      = The_Util::get_attr_data( $data );
$attrStyle     = The_Util::get_attr_style( $styles );
$attrClass     = The_Util::get_attr_class( $class );
$attrClassCont = The_Util::get_attr_class( $class_cont );


$output = <<< EOD
<footer $attrClass $attrData $attrStyle>
  $el_particles
  $el_overlay
	<div $attrClassCont>
		$children
	</div>
</footer>
EOD;

/* --------------------------------------------------- */

return $output;
}
