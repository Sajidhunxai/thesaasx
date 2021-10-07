
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-stick-dark" data-navbar="sticky">
	<div class="container">

		<div class="navbar-left">
			<button class="navbar-toggler" type="button">&#9776;</button>
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
				<?php echo thesaasx_get_logo( 'default', 'logo-dark' ); ?>
				<?php echo thesaasx_get_logo( 'light', 'logo-light' ); ?>
			</a>
		</div>

		<section class="navbar-mobile">
			<span class="navbar-divider d-mobile-none"></span>

			<?php
				if ( has_nav_menu( 'navbar' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'navbar',
						'menu_class'     => 'nav nav-navbar',
						'container'      => '',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'walker'         => new The_Walker_Nav_Menu(),
					) );
				}
			?>
		</section>
	</div>
</nav><!-- /.navbar -->
