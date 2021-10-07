<?php

function the_block_render_navbar_1( $X ) {
$X = The_Util::X( $X, __DIR__ );

/* --------------------------------------------------- */

$home_url = esc_url( home_url() );
$site_name = esc_attr( get_bloginfo('name') );
$logo_light = esc_url( THE_PLUGIN_URL . 'assets/img/logo-light.png' );
$logo_dark = esc_url( THE_PLUGIN_URL .'assets/img/logo-dark.png' );

$btn1 = thesaasx_render_button( $X['btn1'] );
$btn2 = thesaasx_render_button( $X['btn2'] );

$navbar = '<nav class="ml-auto"></nav>'; // Fallback if no menu selected
if ( has_nav_menu( 'navbar' ) ) {
  $navbar = wp_nav_menu( array(
    'theme_location' => 'navbar',
    'menu_class'     => 'nav nav-navbar ml-auto',
    'container'      => '',
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'walker'         => new The_Walker_Nav_Menu(),
    'echo'           => false,
  ) );
}


if ( isset( $X['navbar']['logoDark'] ) ) {
  $logo_dark = esc_url( $X['navbar']['logoDark'] );
}

if ( isset( $X['navbar']['logoLight'] ) ) {
  $logo_light = esc_url( $X['navbar']['logoLight'] );
}


if ( ! isset( $X['navbar']['hideBtn1'] ) ) {
  $X['navbar']['hideBtn1'] = false;
}

if ( ! isset( $X['navbar']['hideBtn2'] ) ) {
  $X['navbar']['hideBtn2'] = false;
}


$buttons = '';
$iconCart = '';

if ( ! $X['navbar']['hideBtn1'] || ! $X['navbar']['hideBtn2'] || ! $X['navbar']['hideCart'] || ! $X['navbar']['hideSearchIcon'] ) {
  if ( has_nav_menu( 'navbar' ) ) {
    $buttons .= '<span class="navbar-divider"></span>';
  }


  if ( ! $X['navbar']['hideCart'] && class_exists( 'WooCommerce' ) ) {
    $cartUrl = esc_url( wc_get_cart_url() );
    $cartcount = is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
    $badge = '';
    if ($cartcount > 0) {
      $badge = '<span class="badge badge-number badge-danger">'. $cartcount .'</span>';
    }

$iconCart = <<< EOD
<a class="nav-link" href="$cartUrl">
  <i class="fa fa-shopping-cart"></i>
  $badge
</a>
EOD;
  }


  $iconSearch = '';
  if ( ! $X['navbar']['hideSearchIcon'] ) {
    $iconSearch = '<a class="nav-link" href="#" data-toggle="offcanvas" data-target="#offcanvas-search"><i class="fa fa-search"></i></a>';
  }


  $iconsNav = '';
  if ( $iconCart !== '' || $iconSearch !== '' ) {
$iconsNav = <<< EOD
<div class="navbar_link_icons">
  <nav class="nav nav-navbar">
    $iconCart
    $iconSearch
  </nav>
</div>
EOD;
  }



  $buttons .= $iconsNav;

  $buttons .= '<div class="ml-4">';

  if ( ! $X['navbar']['hideBtn1'] ) {
    $buttons .= $btn1;
  }

  if ( ! $X['navbar']['hideBtn2'] ) {
    $buttons .= $btn2;
  }

  $buttons .= '</div>';
}

$output = <<< EOD
<div class="navbar-left mr-auto">
  <button class="navbar-toggler" type="button">&#9776;</button>
  <a class="navbar-brand" href="$home_url">
    <img class="logo-dark" src="$logo_dark" alt="$site_name" />
    <img class="logo-light" src="$logo_light" alt="$site_name" />
  </a>
</div>

<section class="navbar-mobile">
  $navbar
  $buttons
</section>
EOD;

$output = thesaasx_render_navbar( $X['navbar'], $output );

/* --------------------------------------------------- */

return $output;
}
