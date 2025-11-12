
<?php
/**
 * WordPress Snippet: Hussainas - Remove Dashboard Widgets
 * Description:   A simple code snippet to remove default WordPress dashboard widgets for a cleaner admin interface.
 *
 * @package   Hussainas_Remove_Dashboard_Widgets
 * @version     1.0.0
 * @license     MIT
 * @author      Hussain Ahmed Shrabon
 * @link        https://github.com/iamhussaina
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Removes the default WordPress dashboard widgets.
 *
 * This function is hooked into 'wp_dashboard_setup' to unregister
 * core dashboard meta boxes, providing a cleaner admin experience.
 * It also removes the "Welcome" panel.
 *
 * @since 1.0.0
 * @return void
 */
function hussainas_remove_core_dashboard_widgets() {

	// Remove the "Welcome" panel
	remove_action( 'welcome_panel', 'wp_welcome_panel' );

	/**
	 * Target specific widgets by their ID, context ('normal', 'side'),
	 * and priority ('high', 'low', 'core', 'default').
	 */

	// Remove 'At a Glance'
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );

	// Remove 'Activity' (Recent Comments, Recently Published)
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );

	// Remove 'Quick Draft'
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );

	// Remove 'WordPress Events and News'
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );

	// Remove 'Site Health Status'
	remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );

}

// Hook the function into the dashboard setup action.
// We use a high priority (999) to ensure it runs after widgets are registered.
add_action( 'wp_dashboard_setup', 'hussainas_remove_core_dashboard_widgets', 999 );
