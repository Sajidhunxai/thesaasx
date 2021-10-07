<?php

function thesaasx_render_section( $attributes, $children ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$BG  = $X['background'];
$tag = $X['isHeaderTag'] ? 'header' : 'section';

$class   = [];
$class[] = $X['isHeaderTag']              ?  'header' : 'section';
$class[] = $X['textWhite']                ?  'text-white' : '';
$class[] = $X['fullscreen']               ?  'h-fullscreen' : '';
$class[] = $X['overflowHidden']           ?  'overflow-hidden' : '';
$class[] = $X['borderTop']                ?  'bt-1' : '';
$class[] = $X['borderBottom']             ?  'bb-1' : '';
$class[] = $BG['imageStyle'] == 'fixed'   ?  'bg-fixed' : '';
$class[] = $BG['imageStyle'] == 'contain' ?  'bg-size-contain' : '';
$class[] = $BG['type']       == 'video'   ?  'section-video' : '';
$class[] = $X['paddingTop'];
$class[] = $X['paddingBottom'];
$class[] = $X['class'];
$class[] = isset( $attributes['className'] ) ? $attributes['className'] : '';


$class_cont   = [];
$class_cont[] = $X['container'] === '' ? 'container' : 'container-'. $X['container'];
$class_cont[] = $X['fullscreen']       ? 'h-100' : '';


$styles = [
	'background-color' => $BG['color'],
];


$data = [
	'id' => $X['id'],
];


switch ( $BG['type'] ) {
	case 'color':

		break;

	case 'gradient':
		$styles['background-image'] = $BG['gradient'];
		break;

	case 'image':
		if ( $BG['imageStyle'] == 'parallax' ) {
			$data['data-parallax'] = $BG['image'];
		}
		else {
			$styles['background-image'] = 'url('. $BG['image'] .')';
		}
		break;

	case 'video':
		if ( $X['video']['source'] == 'youtube' ) {
			$data['data-video'] = $X['video']['youtube'];
		}
		break;
}


$el_particles = thesaasx_render_section_particle( $X['particles'] );
$el_overlay   = thesaasx_render_section_overlay( $X['overlay'] );
$el_video     = thesaasx_render_section_video( $X['video'] );
$el_header    = thesaasx_render_section_header( $X['header'] );


$attrData      = The_Util::get_attr_data ( $data );
$attrStyle     = The_Util::get_attr_style( $styles );
$attrClass     = The_Util::get_attr_class( $class );
$attrClassCont = The_Util::get_attr_class( $class_cont );


$output = <<< EOD
<$tag $attrClass $attrData $attrStyle>
	$el_particles
	$el_overlay
	$el_video
	<div $attrClassCont>
		$el_header
		$children
	</div>
</$tag>
EOD;

/* --------------------------------------------------- */

return do_shortcode( $output );
}
