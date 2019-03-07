<?php 
/*
 * Plugin Name: Project Pack
 * Plugin URI: http://bearsthemes/
 * Description: WordPress plugin helper
 * Version: 1.0.0
 * Author: Bearsthemes
 * Author URI: http://bearsthemes.com/
 * Text Domain: pp
 */

require __DIR__ . '/vendor/autoload.php';

if(! function_exists('special_offer_plugin_crb_load')) {
    /**
     * @since 1.0.0
     *  
     */
    function special_offer_plugin_crb_load() {
        \Carbon_Fields\Carbon_Fields::boot();
    }
    
    add_action( 'after_setup_theme', 'special_offer_plugin_crb_load' );
}

if(! function_exists('bears_compiler_scss_to_css')) {
	/**
	 * Compiler scss to css func
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function project_pack_compiler_scss_to_css( $scss_path = '', $css_path = '', $import_path = null, $formatters = 'Leafo\ScssPhp\Formatter\Crunched' ) {

		$scss = new Leafo\ScssPhp\Compiler();
		if( ! empty( $import_path ) ) $scss->setImportPaths( $import_path );
		$scss->setFormatter( $formatters );

		$scss_content = file_get_contents( $scss_path );
		file_put_contents( $css_path, $scss->compile( $scss_content ) );
	}
}