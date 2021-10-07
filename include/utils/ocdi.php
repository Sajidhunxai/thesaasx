<?php


function thesaasx_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Demo Content',
			'categories'                   => array( 'All' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'assets/data/demo-content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'assets/data/demo-widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'assets/data/demo-customizer.dat',
			'import_preview_image_url'     => THE_PLUGIN_URL . 'screenshot.png',
			'import_notice'                => esc_html__( 'Please notice that importing all pages are not a recommended way to get started, since you can simply import the pages that you need from the page builder. Press the following button if you still need to import all the pages.', 'thesaasx' ),
			'preview_url'              => 'http://thetheme.io/thesaasx',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'thesaasx_ocdi_import_files' );


function thesaas_ocdi_after_import( $selected_import ) {

	// Set Menu
	//
	$menu_navbar  = get_term_by('name', 'Primary Navbar', 'nav_menu');
	set_theme_mod( 'nav_menu_locations' , array( 
		'navbar' => $menu_navbar->term_id,
	));


	// Assign front page and posts page (blog page)
	// 
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'thesaas_ocdi_after_import' );


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

