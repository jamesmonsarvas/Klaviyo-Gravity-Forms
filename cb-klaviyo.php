<?php
/**
 * Plugin Name: Basic Klaviyo
 * Plugin URI:  https://creativebananas.ph
 * Description: Klaviyo integration with Gravity Forms.
 * Version:     1.0.0
 * Author:      Creative Bananas
 * Author URI:  https://creativebananas.ph
 * Text Domain: cb-klaviyo
 */

defined( 'ABSPATH' ) || exit;

// Define constant.
define( 'CB_KLAVIYO_DIR', plugin_dir_path( __FILE__ ) );

// For debugging.
define( 'CB_KLAVIYO_DEBUG', false );

// Define config.
define( 'CB_KLAVIYO_PRIVATE_API_KEY', 'pk_25f4ef068847e61c7965a5b3e5db415811' );
define( 'CB_KLAVIYO_FORM', '4' );

// Load files.
require_once CB_KLAVIYO_DIR . '/vendor/autoload.php';

add_action( 'plugins_loaded', 'cb_klaviyo_run' );
/**
 * Run plugin.
 */
function cb_klaviyo_run() {
	require_once CB_KLAVIYO_DIR . '/includes/register.php';
	add_action( 'gform_after_submission_' . CB_KLAVIYO_FORM, 'CB_Klaviyo\Register\submission', 10 );
}
