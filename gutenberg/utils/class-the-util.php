<?php

/**
 * Utility classes for PHP components
 */


class The_Util {

	/**
	 * Read config.json and merge with attributes.
	 */
	public static function X( $attributes, $dir ) {
		$config = json_decode( file_get_contents( $dir ."/config.json" ), true );

		$func_refine = function( &$value, $key ) {
			if ( is_string( $value ) && strlen( $value ) > 0 ) {
				$img_url =  THE_PLUGIN_URL .'assets/img/';
				$value = str_replace( '(img) ', $img_url, $value );
			}
		};
		array_walk_recursive( $config, $func_refine );



		if ( is_array( $attributes ) ) {
			//if ( isset( $attributes['default'] ) ) {
			//	$attributes = $attributes['default'];
			//}
			/*
			if ( isset( $config['default'] ) ) {
				$config = $config['default'];
			}
			*/
			//var_dump($dir, $attributes);
			//return $attributes;
			//$attributes = $attributes + $config;
			//return self::merge_attributes( $config, $attributes );
			//var_dump($res);
			//var_dump($res);


			if ( isset( $attributes['type'] ) && isset( $attributes['default'] ) ) {
				return self::merge_attributes( $config, $attributes['default'] );
			}
			else {
				$output = $attributes + $config;
				//var_dump($output);

				// Prepare section, navbar and footer attributes to be useable
				// && isset( $output['section']['default'] )
				if ( isset( $output['section'] ) ) {
					$output['section'] = self::X( $output['section'], THE_PLUGIN_PATH .'gutenberg/components/section' );
				}

				if ( isset( $output['footer'] ) ) {
					$output['footer'] = self::X( $output['footer'], THE_PLUGIN_PATH .'gutenberg/components/footer' );
				}

				if ( isset( $output['navbar'] ) ) {
					$output['navbar'] = self::X( $output['navbar'], THE_PLUGIN_PATH .'gutenberg/components/navbar' );
				}

				if ( isset( $output['btnPlay'] ) ) {
					$output['btnPlay'] = self::X( $output['btnPlay'], THE_PLUGIN_PATH .'gutenberg/components/button' );
				}

				return $output;
			}
		}
		return $config;
	}


	/**
	 * Merge config and attribute arrays together and keep attributes value.
	 */
	public static function merge_attributes( &$config, &$attributes ) {
		$merged = $config;

		foreach ( $attributes as $key => $value ):

			if ( is_array( $value ) ) {
				$merged[ $key ] = self::merge_attributes( $merged[ $key ], $value );
			}
			else {
				$merged[ $key ] = $value;
			}
		endforeach;

		return $merged;
	}


	public static function merge_attributes_OLD(  &$array1, &$array2 ) {
		$merged = $array1;

		foreach ( $array2 as $key => & $value ):
			if ( is_array( $value ) && isset( $merged[ $key ] ) && is_array( $merged[ $key ] ) ) {
				$merged[ $key ] = self::merge_attributes( $merged[ $key ], $value );
			}
			else {
				$merged[$key] = $value;
			}
		endforeach;

		return $merged;
	}

	/**
	 * Return entries with a $name prefix from $attributes
	 */
	public static function attr_filter( $attributes, $name, $with_=true ) {
		if ( $with_ ) {
			$name .= '_';
		}

		$keys = preg_grep( '!^'. $name .'!', array_keys( $attributes ) );
		$vals = array();
		foreach ( $keys as $key )
		{
			$vals[ str_replace($name, '', $key) ] = $attributes[$key];
		}
		return $vals;
	}


	/**
	 * Get an array of classes and return a class attribute
	 */
	public static function get_attr_class( $source ) {
		$output = '';

		foreach ($source as $k => $v) {
			if ( $v !== '' ) {
				$output .= $v . ' ';
			}
		}

		$output = trim( $output );
		if ( $output ) {
			$output = 'class="'. esc_attr( $output ) .'"';
		}

		return $output;
	}


	/**
	 * Convert an array into a string of data attributes
	 */
	public static function get_attr_data( $source ) {
		$output = '';

		foreach ($source as $k => $v) {
			if ( $v === null || $v === '' ) {
				continue;
			}

			if ( $v === false ) {
				$v = 'false';
			}

			$output .= $k .'="'. esc_attr($v) .'" ';
		}

		return trim( $output );
	}


	/**
	 * Get an array of css properties and return a style attribute
	 */
	public static function get_attr_style( $source ) {
		$output = '';

		foreach ($source as $k => $v) {
			if ( $v ) {
				$output .= $k .': '. $v .'; ';
			}
		}

		$output = trim( $output );
		if ( $output ) {
			$output = 'style="'. esc_attr( $output ) .'"';
		}

		return $output;
	}


	/* -------- DEPRICATED --------------- */

	/**
	 * Get an array of classes and return a class attribute
	 */
	public static function get_class_attr( $source ) {
		$output = '';

		foreach ($source as $k => $v) {
			if ( $v !== '' ) {
				$output .= $v . ' ';
			}
		}

		$output = trim( $output );
		if ( $output ) {
			$output = 'class="'. esc_attr( $output ) .'"';
		}

		return $output;
	}


	/**
	 * Convert an array into a string of data attributes
	 */
	public static function get_data_attrs( $source ) {
		$output = '';

		foreach ($source as $k => $v) {
			if ( $v ) {
				$output .= $k .'="'. esc_attr($v) .'" ';
			}
		}

		return trim( $output );
	}


	/**
	 * Get an array of css properties and return a style attribute
	 */
	public static function get_style_attr( $source ) {
		$output = '';

		foreach ($source as $k => $v) {
			if ( $v ) {
				$output .= $k .': '. $v .'; ';
			}
		}

		$output = trim( $output );
		if ( $output ) {
			$output = 'style="'. esc_attr( $output ) .'"';
		}

		return $output;
	}



}

