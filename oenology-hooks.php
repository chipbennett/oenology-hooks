<?php
/**
 * Plugin Name: Oenology Hooks
 * Plugin URI: http://www.chipbennett.net/wordpress/plugins/oenology-hooks/
 * Description: Provides a UI for manipulating the custom hooks in the Oenology Theme
 * Version: 2.1
 * Author: chipbennett
 * Author URI: http://www.chipbennett.net/
 *
 * License:      GNU General Public License, v2 (or newer)
 * License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Oenology Hooks WordPress Plugin, Copyright (C) 2011 Chip Bennett
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
 
/**
 * Retrieve all hooks in the Oenology Theme
 */
function oenology_hooks_get_hooks() {
	$hooks = array(
		'extent_before' => array(
			'name' => 'extent_before',
			'title' => 'Extent Before',
			'description' => 'Output content before all site content.',
			'type' => 'Action',
			'section' => 'extent',
			'tab' => 'extent',
			'default' => false
		),
		'extent_after' => array(
			'name' => 'extent_after',
			'title' => 'Extent After',
			'description' => 'Output content after all site content.',
			'type' => 'Action',
			'section' => 'extent',
			'tab' => 'extent',
			'default' => false
		),
		'site_header_before' => array(
			'name' => 'site_header_before',
			'title' => 'Site Header Before',
			'description' => 'Output content before the site header.',
			'type' => 'Action',
			'section' => 'header',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_header' => array(
			'name' => 'site_header',
			'title' => 'Site Header',
			'description' => 'Replace the site header content.',
			'type' => 'Filter',
			'section' => 'header',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_header_after' => array(
			'name' => 'site_header_after',
			'title' => 'Site Header After',
			'description' => 'Output content after the site header content.',
			'type' => 'Action',
			'section' => 'header',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_footer_before' => array(
			'name' => 'site_footer_before',
			'title' => 'Site Footer Before',
			'description' => 'Output content before the site footer content.',
			'type' => 'Action',
			'section' => 'footer',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_footer' => array(
			'name' => 'site_footer',
			'title' => 'Site Footer',
			'description' => 'Replace the site footer content.',
			'type' => 'Filter',
			'section' => 'footer',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_footer_after' => array(
			'name' => 'site_footer_after',
			'title' => 'Site Footer After',
			'description' => 'Output content after the site footer content.',
			'type' => 'Action',
			'section' => 'footer',
			'tab' => 'headerfooter',
			'default' => false
		),
		'loop_header_before' => array(
			'name' => 'loop_header_before',
			'title' => 'Loop Header Before',
			'description' => 'Output content before the loop header content.',
			'type' => 'Action',
			'section' => 'loop_header',
			'tab' => 'loop',
			'default' => false
		),
		'loop_header_after' => array(
			'name' => 'loop_header_after',
			'title' => 'Loop Header After',
			'description' => 'Output content after the loop header content.',
			'type' => 'Action',
			'section' => 'loop_header',
			'tab' => 'loop',
			'default' => false
		),
		'loop_footer_before' => array(
			'name' => 'loop_footer_before',
			'title' => 'Loop Footer Before',
			'description' => 'Output content before the loop footer content.',
			'type' => 'Action',
			'section' => 'loop_footer',
			'tab' => 'loop',
			'default' => false
		),
		'loop_footer' => array(
			'name' => 'loop_footer',
			'title' => 'Loop Footer',
			'description' => 'Replace the loop footer content.',
			'type' => 'Filter',
			'section' => 'loop_footer',
			'tab' => 'loop',
			'default' => false
		),
		'loop_footer_after' => array(
			'name' => 'loop_footer_after',
			'title' => 'Loop Footer After',
			'description' => 'Output content after the loop footer content.',
			'type' => 'Action',
			'section' => 'loop_footer',
			'tab' => 'loop',
			'default' => false
		),
		'post_before' => array(
			'name' => 'post_before',
			'title' => 'Post Before',
			'description' => 'Output content before the post content.',
			'type' => 'Action',
			'section' => 'post',
			'tab' => 'post',
			'default' => false
		),
		'post_after' => array(
			'name' => 'post_after',
			'title' => 'Post After',
			'description' => 'Output content after the post content.',
			'type' => 'Action',
			'section' => 'post',
			'tab' => 'post',
			'default' => false
		),
		'post_header_before' => array(
			'name' => 'post_header_before',
			'title' => 'Post Header Before',
			'description' => 'Output content before the post header content.',
			'type' => 'Action',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_date' => array(
			'name' => 'post_header_date',
			'title' => 'Post Header Date',
			'description' => 'Replace the post header date content.',
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_title' => array(
			'name' => 'post_header_title',
			'title' => 'Post Header Title',
			'description' => 'Replace the post header title content.',
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_thumbnail' => array(
			'name' => 'post_header_thumbnail',
			'title' => 'Post Header Thumbnail',
			'description' => 'Replace the post header thumbnail content.',
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_metadata' => array(
			'name' => 'post_header_metadata',
			'title' => 'Post Header Metadata',
			'description' => 'Replace the post header metadata content.',
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_taxonomies' => array(
			'name' => 'post_header_taxonomies',
			'title' => 'Post Header Taxonomies',
			'description' => 'Replace the post header taxonomies content.',
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_after' => array(
			'name' => 'post_header_after',
			'title' => 'Post Header After',
			'description' => 'Output content after the post header content.',
			'type' => 'Action',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_entry_before' => array(
			'name' => 'post_entry_before',
			'title' => 'Post Entry Before',
			'description' => 'Output content before the post entry content.',
			'type' => 'Action',
			'section' => 'post_entry',
			'tab' => 'post',
			'default' => false
		),
		'post_404' => array(
			'name' => 'post_404',
			'title' => 'Post 404',
			'description' => 'Replace the Error 404 page content.',
			'type' => 'Filter',
			'section' => 'post_entry',
			'tab' => 'post',
			'default' => false
		),
		'post_entry_after' => array(
			'name' => 'post_entry_after',
			'title' => 'Post Entry After',
			'description' => 'Output content after the post entry content.',
			'type' => 'Action',
			'section' => 'post_entry',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_before' => array(
			'name' => 'post_footer_before',
			'title' => 'Post Footer Before',
			'description' => 'Output content before the post footer content.',
			'type' => 'Action',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_avatar' => array(
			'name' => 'post_footer_avatar',
			'title' => 'Post Footer Avatar',
			'description' => 'Replace the post footer avatar content.',
			'type' => 'Filter',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_metadata' => array(
			'name' => 'post_footer_metadata',
			'title' => 'Post Footer Metadata',
			'description' => 'Replace the post footer metadata content.',
			'type' => 'Filter',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_license' => array(
			'name' => 'post_footer_license',
			'title' => 'Post Footer License',
			'description' => 'Add post footer license content.',
			'type' => 'Filter',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_after' => array(
			'name' => 'post_footer_after',
			'title' => 'Post Footer After',
			'description' => 'Output content after the post footer content.',
			'type' => 'Action',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_comments_before' => array(
			'name' => 'post_comments_before',
			'title' => 'Post Comments Before',
			'description' => 'Output content before the post comments content.',
			'type' => 'Action',
			'section' => 'post_comments',
			'tab' => 'post',
			'default' => false
		),
		'post_comments_after' => array(
			'name' => 'post_comments_after',
			'title' => 'Post Comments After',
			'description' => 'Output content after the post comments content.',
			'type' => 'Action',
			'section' => 'post_comments',
			'tab' => 'post',
			'default' => false
		)
	);
	return $hooks;
}

/**
 * Die if Oenology is not the active Theme
 */
function oenology_hooks_check_template() {
	$templatedir = get_template_directory_uri();
	$temp = explode( content_url( 'themes/' ) , $templatedir );
	$template = $temp[1];
	if ( 'oenology' != $template ) {
		wp_die( 
			'The Oenology Hooks Plugin requires the Oenology Theme, and should only be run when the Oenology Theme is active. It is used to configure action and filter hooks specific to Oenology.',
			'Oenology Hooks Plugin',
			array( 'back_link' => true )
		);
	}
}
/**
 * Hook Template Check into 'switch_theme' hook
 */
add_action( 'switch_theme', 'oenology_hooks_check_template' );

/**
 * Initialize the Oenology Hooks Plugin
 * 
 * Die if Oenology is not the active Theme, otherwise
 * set up the default Plugin settings.
 */
function oenology_hooks_init() {

	oenology_hooks_check_template();
	
	$settings = get_option( 'plugin_oenology_hooks_settings' );
	$hooks = oenology_hooks_get_hooks();
	$defaults = array();
	foreach ( $hooks as $hook ) {
		$hookname = $hook['name'];
		$hookdefault = $hook['default'];
		$defaults[$hookname] = $hookdefault;
		if ( 'Filter' == $hook['type'] ) {
			$hookhide = $hookname . '_hide';
			$defaults[$hookhide] = false;
		}
	}
	if ( false === $settings ) {
		update_option( 'plugin_oenology_hooks_settings', $defaults );
	} else {
		$allhooks = array_merge( $defaults, $settings );
		update_option( 'plugin_oenology_hooks_settings', $allhooks );
	}
}
/**
 * Hook the init function into the
 * Oenology Hooks Plugin activation hook.
 */
register_activation_hook( __FILE__, 'oenology_hooks_init' );

/**
 * Global variable that contains the
 * Plugin's contextual help hook.
 * 
 * @global string	$oenology_hooks_admin_hook
 */
global $oenology_hooks_admin_hook;

/**
 * Add Oenology Hooks Admin Page
 * 
 * Add the "Oenology Hooks" page to the WP-Admin
 * menu, under the "Appearance" menu entry.
 */
function oenology_hooks_menu() {
	global $oenology_hooks_admin_hook;
	$oenology_hooks_admin_hook = add_theme_page( 'Oenology Hooks', 'Oenology Hooks', 'edit_theme_options', 'oenology-hooks', 'oenology_hooks_page');
}
/**
 * Hook the Oenology Hooks page into 'admin_menu'
 * 
 * Hook the "Oenology Hooks" page into the action
 * hook 'admin_menu', so that the page is added
 * to the Admin menu.
 */
add_action( 'admin_menu', 'oenology_hooks_menu' );

/**
 * Separate Settings Page by Tabs
 * 
 * Have separate settings page tabs for the
 * Extent, Header/Footer, Loop, and Post
 * Hooks.
 */
function oenology_hooks_get_settings_page_tabs() {
	
	$tabs = array( 
        'extent' => array(
			'name' => 'extent',
			'title' => 'Extent',
			'sections' => array(
				'extent' => array(
					'name' => 'extent',
					'title' => 'Site Extent Hooks',
					'description' => 'These hooks output content before and after all of the site content.'
				)
			)
		),
        'headerfooter' => array(
			'name' => 'headerfooter',
			'title' => 'Header/Footer',
			'sections' => array(
				'header' => array(
					'name' => 'header',
					'title' => 'Site Header Hooks',
					'description' => 'These hooks output content in the Site Header.'
				),
				'footer' => array(
					'name' => 'footer',
					'title' => 'Site Footer Hooks',
					'description' => 'These hooks output content in the Site Footer.'
				)
			)
		),
		'loop' => array(
			'name' => 'loop',
			'title' => 'Loop',
			'sections' => array(
				'loop_header' => array(
					'name' => 'loop_header',
					'title' => 'Loop Header Hooks',
					'description' => 'These hooks output content in the Loop Header.'
				),
				'loop_footer' => array(
					'name' => 'loop_footer',
					'title' => 'Loop Footer Hooks',
					'description' => 'These hooks output content in the Loop footer.'
				)
			)
		),
		'post' => array(
			'name' => 'post',
			'title' => 'Post',
			'sections' => array(
				'post' => array(
					'name' => 'post',
					'title' => 'Post Hooks',
					'description' => 'These hooks output content before/after each Post. These are global settings. To modify settings for a specific post, see the post edit screen.'
				),
				'post_header' => array(
					'name' => 'post_header',
					'title' => 'Post Header Hooks',
					'description' => 'These hooks output content in the header of each Post.'
				),
				'post_entry' => array(
					'name' => 'post_entry',
					'title' => 'Post Entry Hooks',
					'description' => 'These hooks output content in each Post entry.'
				),
				'post_footer' => array(
					'name' => 'post_footer',
					'title' => 'Post Footer Hooks',
					'description' => 'These hooks output content in the footer of each Post.'
				),
				'post_comments' => array(
					'name' => 'post_comments',
					'title' => 'Post Comments Hooks',
					'description' => 'These hooks output content in the comments section of each Post.'
				)
			)
		)
    );
	return $tabs;
}
/**
 * Get current settings page tab
 */
function oenology_hooks_get_current_tab( $current = 'extent' ) {

    if ( isset ( $_GET['tab'] ) ) :
        $current = $_GET['tab'];
    else:
        $current = 'extent';
    endif;
	
	return $current;
}

/**
 * Define Settings Page Tabs
 */
function oenology_hooks_settings_page_tabs( $current = 'extent' ) {

	$current = oenology_hooks_get_current_tab();
    
    $tabs = oenology_hooks_get_settings_page_tabs();
    
    $links = array();
    
    foreach( $tabs as $tab ) :
		$tabname = $tab['name'];
		$tabtitle = $tab['title'];
        if ( $tabname == $current ) :
            $links[] = "<a class='nav-tab nav-tab-active' href='?page=oenology-hooks&tab=$tabname'>$tabtitle</a>";
        else :
            $links[] = "<a class='nav-tab' href='?page=oenology-hooks&tab=$tabname'>$tabtitle</a>";
        endif;
    endforeach;
    
    echo '<div id="icon-themes" class="icon32"><br /></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach ( $links as $link )
        echo $link;
    echo '</h2>';
    
}

/**
 * Define Oenology Hooks page markup
 * 
 * Define the markup for the "Oenology Hooks" admin
 * page.
 */
function oenology_hooks_page() {
	$currenttab = oenology_hooks_get_current_tab();
	$settings_section = 'oenology_hooks_' . $currenttab . '_tab';
	?>
	<div class="wrap">
		<?php oenology_hooks_settings_page_tabs(); ?>
		<?php if ( isset( $_GET['settings-updated'] ) ) {
    			echo "<div class='updated'><p>Hooks settings updated successfully.</p></div>";
		} ?>
	
		<form action="options.php" method="post">
		<?php 
			settings_fields( 'plugin_oenology_hooks_settings' );
			do_settings_sections( $settings_section );
		?>
			<input name="plugin_oenology_hooks_settings[submit-<?php echo $currenttab; ?>]" type="submit" class="button-primary" value="Save Settings" />
			<input name="plugin_oenology_hooks_settings[reset-<?php echo $currenttab; ?>]" type="submit" class="button-secondary" value="Reset Defaults" />
		</form>
		
	</div>
	<?php 
}

/**
 * Enqueue custom Admin style for Oenology Hooks page
 * 
 * Enqueue the Oenology Theme Admin Stylesheet at 
 * the 'admin_print_styles' action hook.
 */
add_action('admin_print_styles-appearance_page_oenology-hooks', 'oenology_enqueue_admin_style', 11 );

/**
 * Register Oenology Hooks Settings
 * 
 * Use WordPress Settings API to register
 * the Oenology Hooks Plugin settings.
 */
function oenology_hooks_register_settings(){
	$settingsfile = WP_PLUGIN_DIR . '/oenology-hooks/settings.php';
	require( $settingsfile );
}
/**
 * Hook Oenology Hooks Plugin Settings into 'admin_init'
 * 
 * Hook the Oenology Hooks Plugin Settings Registration
 * into the 'admin_init' action hook.
 */
add_action('admin_init', 'oenology_hooks_register_settings');

/**
 * Apply Global User Hook Settings
 * 
 * Apply user-defined global content to the
 * custom Oenology Theme action and filter 
 * hooks.
 */
global $oenology_hooks;
$oenology_hooks = get_option( 'plugin_oenology_hooks_settings' );
$allhooks = oenology_hooks_get_hooks();
foreach ( $allhooks as $hook ) {
	$hookname = $hook['name'];
	$hooktype = $hook['type'];
	$action = false;
	$filter = false;
	if ( 'Filter' == $hooktype ) {
		$filter = 'oenology_hook_' . $hookname;
		$hookhide = $hookname . '_hide';
		if ( true == $oenology_hooks[$hookhide] ) {
			add_filter( $filter, '__return_false' );
		} else if ( false != $oenology_hooks[$hookname] ) {
			$output = $oenology_hooks[$hookname];
			$callback = create_function( '$input', 'return '. var_export( $output, true ) . ';' );
			add_filter( $filter, $callback );
		} 
	} else if ( 'Action' == $hooktype ) {
		$action = 'oenology_hook_' . $hookname;
		if ( false != $oenology_hooks[$hookname] ) {
			$output = $oenology_hooks[$hookname];
			$callback = create_function( '', 'echo'. var_export( $output, true ) .';' );
			add_action( $action, $callback );
		}
	}
}
?>