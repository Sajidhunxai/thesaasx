<?php


// Source: https://gist.github.com/kucrut/3804376


add_action( 'init', array( 'Thesaasx_Nav_Menu_Item_Custom_Fields', 'setup' ) );
class Thesaasx_Nav_Menu_Item_Custom_Fields {
	static $options = array(
		'item_tpl' => '
			<p class="additional-menu-field-{name} description description-thin">
				<label for="edit-menu-item-{name}-{id}">
					{label}<br>
					<input
						type="{input_type}"
						id="edit-menu-item-{name}-{id}"
						class="widefat code edit-menu-item-{name}"
						name="menu-item-{name}[{id}]"
						min="1"
						max="4"
						value="{value}">
				</label>
			</p>
		',
	);
	static function setup() {
		if ( !is_admin() )
			return;
		$new_fields = apply_filters( 'thesaasx_nav_menu_item_additional_fields', array() );
		if ( empty($new_fields) )
			return;
		self::$options['fields'] = self::get_fields_schema( $new_fields );
		add_filter( 'wp_edit_nav_menu_walker', function () {
			return 'Thesaasx_Walker_Nav_Menu_Edit';
		});
		//add_filter( 'thesaasx_nav_menu_item_additional_fields', array( __CLASS__, '_add_fields' ), 10, 5 );
		add_action( 'save_post', array( __CLASS__, '_save_post' ), 10, 2 );
	}
	static function get_fields_schema( $new_fields ) {
		$schema = array();
		foreach( $new_fields as $name => $field) {
			if (empty($field['name'])) {
				$field['name'] = $name;
			}
			$schema[] = $field;
		}
		return $schema;
	}
	static function get_menu_item_postmeta_key($name) {
		return '_menu_item_' . $name;
	}
	/**
	 * Inject the
	 * @hook {action} save_post
	 */
	static function get_field( $item, $depth, $args ) {
		$new_fields = '';
		foreach( self::$options['fields'] as $field ) {
			$field['value'] = get_post_meta($item->ID, self::get_menu_item_postmeta_key($field['name']), true);

			//
			//
			if ( $depth === 0 && $field['name'] === 'divider' ) {
				continue;
			}

			if ( $depth !== 0 && $field['name'] === 'columns' ) {
				continue;
			}

			$template = self::$options['item_tpl'];

			if ( $field['name'] === 'columns' && $field['value'] == '' ) {
				$field['value'] = '1';
			}


			if ( $field['name'] == 'divider' ) {
				$v = $field['value'];
				if ( $field['value'] == '' ) {
					$field['value'] = 'no';
				}

				$template = '
				<p class="additional-menu-field-{name} description description-thin">
					<label for="edit-menu-item-{name}-{id}">
						{label}<br>
						<select
							id="edit-menu-item-{name}-{id}"
							class="widefat code edit-menu-item-{name}"
							name="menu-item-{name}[{id}]">
							<option value="no"'. ($v!=='yes' ? ' selected' : '') .'>No</option>
							<option value="yes"'. ($v==='yes' ? ' selected' : '') .'>Yes</option>
						</select>
					</label>
				</p>';
			}
			//
			//

			$field['id'] = $item->ID;
			$new_fields .= str_replace(
				array_map(function($key){ return '{' . $key . '}'; }, array_keys($field)),
				array_values(array_map('esc_attr', $field)),
				$template
				//self::$options['item_tpl']
			);
		}
		return $new_fields;
	}
	/**
	 * Save the newly submitted fields
	 * @hook {action} save_post
	 */
	static function _save_post($post_id, $post) {
		if ( $post->post_type !== 'nav_menu_item' ) {
			return $post_id; // prevent weird things from happening
		}
		foreach( self::$options['fields'] as $field_schema ) {
			$form_field_name = 'menu-item-' . $field_schema['name'];
			// @todo FALSE should always be used as the default $value, otherwise we wouldn't be able to clear checkboxes
			if (isset($_POST[$form_field_name][$post_id])) {
				$key = self::get_menu_item_postmeta_key($field_schema['name']);
				$value = stripslashes($_POST[$form_field_name][$post_id]);
				update_post_meta($post_id, $key, $value);
			}
		}
	}
}
// @todo This class needs to be in it's own file so we can include id J.I.T.
// requiring the nav-menu.php file on every page load is not so wise
require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
class Thesaasx_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$item_output = '';
		parent::start_el($item_output, $item, $depth, $args, $id);
		// Inject $new_fields before: <div class="menu-item-actions description-wide submitbox">
		if ( $new_fields = Thesaasx_Nav_Menu_Item_Custom_Fields::get_field( $item, $depth, $args ) ) {
			$item_output = preg_replace('/(?=<div[^>]+class="[^"]*submitbox)/', $new_fields, $item_output);
		}
		$output .= $item_output;
	}
}
// Somewhere in config...
add_filter( 'thesaasx_nav_menu_item_additional_fields', 'thesaasx_menu_item_additional_fields' );
function thesaasx_menu_item_additional_fields( $fields ) {
	$fields['columns'] = array(
		'name' => 'columns',
		'label' => __('Columns', 'thesaasx'),
		'container_class' => 'submenu-columns',
		'input_type' => 'number',
		'value' => '1',
	);

	$fields['divider'] = array(
		'name' => 'divider',
		'label' => __('Add divider before menu?', 'thesaasx'),
		'container_class' => 'submenu-divider',
		'input_type' => 'select',
		'value' => 'no',
	);

	return $fields;
}

