<?php

function thesaasx_render_nav( $attributes ) {
$X = The_Util::X( $attributes, __DIR__ );

/* --------------------------------------------------- */

$class = [ 'nav' ];
$class[] = $X['class'];

$links = '';
foreach ( $X['links'] as $key => $link ) {
  $url = "#";
  if ( isset( $link['url'] ) ) {
    $url = esc_url( $link['url'] );
  }

  $target = '';
  if ( isset( $link['targetBlank'] ) && $link['targetBlank'] == true ) {
    $target = ' target="_blank"';
  }

	$links .= '<a class="nav-link" href="'. $url .'"'. $target .'>'. $link['text'] .'</a>';
}

$attrClass = The_Util::get_attr_class( $class );


$output = <<< EOD
<div $attrClass>
	$links
</div>
EOD;

/* --------------------------------------------------- */

return $output;
}
