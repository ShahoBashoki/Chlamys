<?php
/**
 *
 * The framework's functions and definitions
 */

/**
 * ------------------------------------------------------------------------------------------------
 * Define constants.
 * ------------------------------------------------------------------------------------------------
 */
update_option( 'woodmart_is_activated', '1' );
use Elementor\Utils;

define( 'WOODMART_THEME_DIR', get_template_directory_uri() );
define( 'WOODMART_THEMEROOT', get_template_directory() );
define( 'WOODMART_IMAGES', WOODMART_THEME_DIR . '/images' );
define( 'WOODMART_SCRIPTS', WOODMART_THEME_DIR . '/js' );
define( 'WOODMART_STYLES', WOODMART_THEME_DIR . '/css' );
define( 'WOODMART_FRAMEWORK', '/inc' );
define( 'WOODMART_DUMMY', WOODMART_THEME_DIR . '/inc/dummy-content' );
define( 'WOODMART_CLASSES', WOODMART_THEMEROOT . '/inc/classes' );
define( 'WOODMART_CONFIGS', WOODMART_THEMEROOT . '/inc/configs' );
define( 'WOODMART_HEADER_BUILDER', WOODMART_THEME_DIR . '/inc/header-builder' );
define( 'WOODMART_ASSETS', WOODMART_THEME_DIR . '/inc/admin/assets' );
define( 'WOODMART_ASSETS_IMAGES', WOODMART_ASSETS . '/images' );
define( 'WOODMART_API_URL', 'https://xtemos.com/licenses/api/' );
define( 'WOODMART_DEMO_URL', 'https://woodmart.xtemos.com/' );
define( 'WOODMART_PLUGINS_URL', WOODMART_DEMO_URL . 'plugins/' );
define( 'WOODMART_DUMMY_URL', WOODMART_DEMO_URL . 'dummy-content/' );
define( 'WOODMART_SLUG', 'woodmart' );
define( 'WOODMART_CORE_VERSION', '1.0.29' );
define( 'WOODMART_WPB_CSS_VERSION', '1.0.2' );

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'http://dl.flatsomee.ir/sources/wdmrt/fghyjuiujyhgfd5444.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'woodmart'
);

/**
 * ------------------------------------------------------------------------------------------------
 * Load all CORE Classes and files
 * ------------------------------------------------------------------------------------------------
 */

if ( ! function_exists( 'woodmart_load_classes' ) ) {
	function woodmart_load_classes() {
		$classes = array(
			'Singleton.php',
			'Ajaxresponse.php',
			'Api.php',
			'Googlefonts.php',
			'Config.php',
			'Cssparser.php',
			'Import.php',
			'Importversion.php',
			'Layout.php',
			'License.php',
			'Notices.php',
			'Options.php',
			'Stylesstorage.php',
			'Theme.php',
			'Themesettingscss.php',
			'Vctemplates.php',
			'Wpbcssgenerator.php',
			'Registry.php',
			'Pagecssfiles.php',
		);

		foreach ( $classes as $class ) {
			$file_name = WOODMART_CLASSES . DIRECTORY_SEPARATOR . $class;
			if ( file_exists( $file_name ) ) {
				require $file_name;
			}
		}
	}
}

woodmart_load_classes();

new WOODMART_Theme();