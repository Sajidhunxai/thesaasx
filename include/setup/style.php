<?php

/**
 * Create style for custom colors.
 */
function thesaasx_custom_color_style() {

$color_primary  = get_theme_mod( 'style_color_primary', '#50a1ff' );

if ( empty( $color_primary ) ) {
  $color_primary = '#50a1ff';
}

if ( $color_primary == '#50a1ff' ) {
  return '';
}



// CSS codes to change primary color
//
$fn_darken  = 'thesaasx_sass_darken';
$fn_lighten = 'thesaasx_sass_lighten';
$fn_light = 'thesaasx_adjustBrightness';
$fn_rgba = 'thesaasx_sass_rgba';
$css_colors = <<<CSS


a, a:hover, a:focus, .btn-outline-primary, .btn-outline-primary:focus, .btn-outline-primary.focus, 
.btn-outline-primary.disabled, .btn-outline-primary:disabled, .btn-link, [data-type].text-primary + .typed-cursor,
.link-color-default a:hover, .link-color-default a:focus, 
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
.h1 a:hover, .h2 a:hover, .h3 a:hover, .h4 a:hover, .h5 a:hover, .h6 a:hover, 
h1 .anchor, h2 .anchor, h3 .anchor, h4 .anchor, h5 .anchor, h6 .anchor,
.h1 .anchor, .h2 .anchor, .h3 .anchor, .h4 .anchor, .h5 .anchor, .h6 .anchor,
.breadcrumb-item a:hover, 
.nav-link.active, .menu-item a.active,
.nav-item.show .nav-link,
.show.menu-item .nav-link,
.nav-item.show .menu-item a,
.menu-item .nav-item.show a,
.show.menu-item a,
.nav-sidebar .nav-link.active, .nav-sidebar .menu-item a.active, .menu-item .nav-sidebar a.active,
.nav-sidebar-pill .nav-item > .nav-link.active, .nav-sidebar-pill .menu-item > .nav-link.active, .nav-sidebar-pill .menu-item .nav-item > a.active, .menu-item .nav-sidebar-pill .nav-item > a.active, .nav-sidebar-pill .menu-item > a.active,
.has-primary-color, .widget_categories .cat-item a:hover, .widget_pages .page_item a:hover, 
.widget_archive li a:hover, .widget_recent_entries li a:hover, .widget_recent_comments li a:hover,
.widget_meta li a:hover, .widget_nav_menu li a:hover {
  color: $color_primary;
}


.text-primary, .social-hover-primary a:hover {
  color: $color_primary !important;
}


.btn-primary, .comment-form .submit,
.btn-primary.disabled, .comment-form .disabled.submit, .btn-primary:disabled, .comment-form .submit:disabled,
.btn-outline-primary:hover, 
.btn-outline-primary:not([disabled]):not(.disabled):active,
.btn-outline-primary:not([disabled]):not(.disabled).active, .show > .btn-outline-primary.dropdown-toggle,
.dropdown-item.active, .dropdown-item:active, .page-item.active .page-link,
.badge-primary, .progress-bar, .list-group-item.active, 
.slider-dots-fill-primary .slick-dots .slick-active button, .timeline::before, 
.custom-radio .custom-control-label::after, .portfolio-1::before, .has-primary-background-color,
.wpcf7-submit {
  background-color: $color_primary;
}


.bg-primary {
  background-color: $color_primary !important;
}

[data-overlay-primary]::before, .switch-input:checked ~ .switch-label::after {
  background: $color_primary;
}


.btn-primary:hover,
.comment-form .submit:hover,
.wpcf7-submit:hover {
  background-color: {$fn_darken($color_primary, 4)};
  border-color: {$fn_darken($color_primary, 4)};
  box-shadow: none;

}


.btn-primary:not([disabled]):not(.disabled):active, .comment-form .submit:not([disabled]):not(.disabled):active,
.btn-primary:not([disabled]):not(.disabled).active, .comment-form .submit:not([disabled]):not(.disabled).active,
.show > .btn-primary.dropdown-toggle,
.comment-form .show > .dropdown-toggle.submit,
.wpcf7-submit:not([disabled]):not(.disabled):active {
  background-color: {$fn_darken($color_primary, 8)};
  border-color: {$fn_darken($color_primary, 8)};
}

.btn-primary, .comment-form .submit, 
.btn-primary.disabled, .comment-form .disabled.submit, .btn-primary:disabled, .comment-form .submit:disabled,
.btn-outline-primary, .btn-outline-primary:hover, 
.btn-outline-primary:not([disabled]):not(.disabled):active, .btn-outline-primary:not([disabled]):not(.disabled).active,
.show > .btn-outline-primary.dropdown-toggle, .page-item.active .page-link, .list-group-item.active,
.timeline-item::before, .custom-checkbox .custom-control-label::after,
.wpcf7-submit {
  border-color: $color_primary;
}


.border-primary {
  border-color: $color_primary !important;
}


.nav-tabs .nav-link.active, .nav-tabs .menu-item a.active, .menu-item .nav-tabs a.active,
.nav-tabs .nav-item.show .nav-link,
.nav-tabs .show.menu-item .nav-link,
.nav-tabs .nav-item.show .menu-item a,
.menu-item .nav-tabs .nav-item.show a,
.nav-tabs .show.menu-item a {
  border-color: $color_primary #f1f2f3 #ffffff;
}


.nav-tabs-minimal .nav-link.active, .nav-tabs-minimal .menu-item a.active, .menu-item .nav-tabs-minimal a.active,
.nav-tabs-minimal .nav-item.show .nav-link,
.nav-tabs-minimal .show.menu-item .nav-link,
.nav-tabs-minimal .nav-item.show .menu-item a,
.menu-item .nav-tabs-minimal .nav-item.show a,
.nav-tabs-minimal .show.menu-item a {
  border-bottom-color: $color_primary;
}


pre {
  border-left-color: $color_primary;
}


::selection {
  background: {$fn_light($color_primary, 30)};
}
::-moz-selection {
  background: {$fn_light($color_primary, 30)};
}
CSS;

return $css_colors;


}






/**
 * Create style for custom fonts.
 */
function thesaasx_custom_font_style() {

$font_body  = get_theme_mod( 'style_font_body', 'Open Sans' );
$font_title = get_theme_mod( 'style_font_title', 'Dosis' );


if ( empty( $font_body ) ) {
  $font_body = 'Open Sans';
}

if ( empty( $font_title ) ) {
  $font_title = 'Dosis';
}


if ( $font_body == 'Open Sans' && $font_title == 'Dosis' ) {
  return '';
}

// CSS codes to change font family
//
$css_fonts = <<<CSS
body,
.tooltip,
.popover,
.lity-close,
.lity-close:hover,
.lity-close:focus,
.lity-close:active,
.lity-close:visited,
.heading-alt,
.font-body {
  font-family: "FONT_BODY", sans-serif;
}

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6,
.font-title {
  font-family: "FONT_TITLE", sans-serif;
}
CSS;

$css_fonts = str_replace( "FONT_BODY", $font_body, $css_fonts );
$css_fonts = str_replace( "FONT_TITLE", $font_title, $css_fonts );

return $css_fonts;

}








// Generate darken color
//
function thesaasx_sass_darken($hex, $percent) {
  preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
  str_replace('%', '', $percent);
  $color = "#";
  for($i = 1; $i <= 3; $i++) {
    $primary_colors[$i] = hexdec($primary_colors[$i]);
    $primary_colors[$i] = round($primary_colors[$i] * (100-($percent*2))/100);
    $color .= str_pad(dechex($primary_colors[$i]), 2, '0', STR_PAD_LEFT);
  }
  if ( strlen($color) > 7 ) {
    //$color = substr($color, 0, 7);
  }
  return $color;
}


// Generate lighten color
//
function thesaasx_sass_lighten($hex, $percent) {
  preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $hex, $primary_colors);
  str_replace('%', '', $percent);
  $color = "#";
  for($i = 1; $i <= 3; $i++) {
    $primary_colors[$i] = hexdec($primary_colors[$i]);
    $primary_colors[$i] = round($primary_colors[$i] * (100+($percent*2))/100);
    $color .= str_pad(dechex($primary_colors[$i]), 2, '0', STR_PAD_LEFT);
  }
  if ( strlen($color) > 7 ) {
    //$color = substr($color, 0, 7);
  }
  return $color;
}


// Convert hexdec color string to rgb(a) string
//
function thesaasx_sass_rgba($color, $opacity = false) {
 
  $default = 'rgb(0,0,0)';
 
  //Return default if no color provided
  if(empty($color))
    return $default; 
 
  //Sanitize $color if "#" is provided 
  if ($color[0] == '#' ) {
    $color = substr( $color, 1 );
  }

  //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
  } elseif ( strlen( $color ) == 3 ) {
    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
  } else {
    return $default;
  }

  //Convert hexadec to rgb
  $rgb =  array_map('hexdec', $hex);

  //Check if opacity is set(rgba or rgb)
  if($opacity){
    if(abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
  } else {
    $output = 'rgb('.implode(",",$rgb).')';
  }

  //Return rgb(a) color string
  return $output;
}


function thesaasx_adjustBrightness($hex, $steps) {
  // Steps should be between -255 and 255. Negative = darker, positive = lighter
  $steps = max(-255, min(255, $steps));

  // Normalize into a six character long hex string
  $hex = str_replace('#', '', $hex);
  if (strlen($hex) == 3) {
      $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
  }

  // Split into three parts: R, G and B
  $color_parts = str_split($hex, 2);
  $return = '#';

  foreach ($color_parts as $color) {
      $color   = hexdec($color); // Convert to decimal
      $color   = max(0,min(255,$color + $steps)); // Adjust color
      $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
  }

  return $return;
}
