<?php
/**
 * Plugin Name: Oenology Hooks
 * Plugin URI: http://www.chipbennett.net/wordpress/plugins/oenology-hooks/
 * Description: Provides a UI for manipulating the custom hooks in the Oenology Theme
 * Version: 2.3
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
 * Load Plugin textdomain
 */
function oenology_hooks_load_textdomain() {
	load_plugin_textdomain( 'oenology-hooks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' ); 
}
// Load Plugin textdomain
add_action( 'plugins_loaded', 'oenology_hooks_load_textdomain' );
 
/**
 * Retrieve all hooks in the Oenology Theme
 */
function oenology_hooks_get_hooks() {
	$hooks = array(
		'extent_before' => array(
			'name' => 'extent_before',
			'title' => __( 'Extent Before', 'oenology-hooks' ),
			'description' => __( 'Output content before all site content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'extent',
			'tab' => 'extent',
			'default' => false
		),
		'extent_after' => array(
			'name' => 'extent_after',
			'title' => __( 'Extent After', 'oenology-hooks' ),
			'description' => __( 'Output content after all site content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'extent',
			'tab' => 'extent',
			'default' => false
		),
		'site_header_before' => array(
			'name' => 'site_header_before',
			'title' => __( 'Site Header Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the site header.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'header',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_header' => array(
			'name' => 'site_header',
			'title' => __( 'Site Header', 'oenology-hooks' ),
			'description' => __( 'Filter the site header content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'header',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_header_after' => array(
			'name' => 'site_header_after',
			'title' => __( 'Site Header After', 'oenology-hooks' ),
			'description' => __( 'Output content after the site header content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'header',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_footer_before' => array(
			'name' => 'site_footer_before',
			'title' => __( 'Site Footer Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the site footer content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'footer',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_footer' => array(
			'name' => 'site_footer',
			'title' => __( 'Site Footer', 'oenology-hooks' ),
			'description' => __( 'Filter the site footer content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'footer',
			'tab' => 'headerfooter',
			'default' => false
		),
		'site_footer_after' => array(
			'name' => 'site_footer_after',
			'title' => __( 'Site Footer After', 'oenology-hooks' ),
			'description' => __( 'Output content after the site footer content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'footer',
			'tab' => 'headerfooter',
			'default' => false
		),
		'loop_header_before' => array(
			'name' => 'loop_header_before',
			'title' => __( 'Loop Header Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the loop header content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'loop_header',
			'tab' => 'loop',
			'default' => false
		),
		'loop_header_after' => array(
			'name' => 'loop_header_after',
			'title' => __( 'Loop Header After', 'oenology-hooks' ),
			'description' => __( 'Output content after the loop header content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'loop_header',
			'tab' => 'loop',
			'default' => false
		),
		'loop_footer_before' => array(
			'name' => 'loop_footer_before',
			'title' => __( 'Loop Footer Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the loop footer content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'loop_footer',
			'tab' => 'loop',
			'default' => false
		),
		'loop_footer' => array(
			'name' => 'loop_footer',
			'title' => __( 'Loop Footer', 'oenology-hooks' ),
			'description' => __( 'Filter the loop footer content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'loop_footer',
			'tab' => 'loop',
			'default' => false
		),
		'loop_footer_after' => array(
			'name' => 'loop_footer_after',
			'title' => __( 'Loop Footer After', 'oenology-hooks' ),
			'description' => __( 'Output content after the loop footer content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'loop_footer',
			'tab' => 'loop',
			'default' => false
		),
		'post_before' => array(
			'name' => 'post_before',
			'title' => __( 'Post Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the post content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post',
			'tab' => 'post',
			'default' => false
		),
		'post_after' => array(
			'name' => 'post_after',
			'title' => __( 'Post After', 'oenology-hooks' ),
			'description' => __( 'Output content after the post content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post',
			'tab' => 'post',
			'default' => false
		),
		'post_header_before' => array(
			'name' => 'post_header_before',
			'title' => __( 'Post Header Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the post header content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_date' => array(
			'name' => 'post_header_date',
			'title' => __( 'Post Header Date', 'oenology-hooks' ),
			'description' => __( 'Filter the post header date content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_title' => array(
			'name' => 'post_header_title',
			'title' => __( 'Post Header Title', 'oenology-hooks' ),
			'description' => __( 'Filter the post header title content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_thumbnail' => array(
			'name' => 'post_header_thumbnail',
			'title' => __( 'Post Header Thumbnail', 'oenology-hooks' ),
			'description' => __( 'Filter the post header thumbnail content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_metadata' => array(
			'name' => 'post_header_metadata',
			'title' => __( 'Post Header Metadata', 'oenology-hooks' ),
			'description' => __( 'Filter the post header metadata content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_taxonomies' => array(
			'name' => 'post_header_taxonomies',
			'title' => __( 'Post Header Taxonomies', 'oenology-hooks' ),
			'description' => __( 'Filter the post header taxonomies content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_header_after' => array(
			'name' => 'post_header_after',
			'title' => __( 'Post Header After', 'oenology-hooks' ),
			'description' => __( 'Output content after the post header content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_header',
			'tab' => 'post',
			'default' => false
		),
		'post_entry_before' => array(
			'name' => 'post_entry_before',
			'title' => __( 'Post Entry Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the post entry content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_entry',
			'tab' => 'post',
			'default' => false
		),
		'post_404' => array(
			'name' => 'post_404',
			'title' => __( 'Post 404', 'oenology-hooks' ),
			'description' => __( 'Filter the Error 404 page content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_entry',
			'tab' => 'post',
			'default' => false
		),
		'post_entry_after' => array(
			'name' => 'post_entry_after',
			'title' => __( 'Post Entry After', 'oenology-hooks' ),
			'description' => __( 'Output content after the post entry content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_entry',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_before' => array(
			'name' => 'post_footer_before',
			'title' => __( 'Post Footer Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the post footer content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_avatar' => array(
			'name' => 'post_footer_avatar',
			'title' => __( 'Post Footer Avatar', 'oenology-hooks' ),
			'description' => __( 'Filter the post footer avatar content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_metadata' => array(
			'name' => 'post_footer_metadata',
			'title' => __( 'Post Footer Metadata', 'oenology-hooks' ),
			'description' => __( 'Filter the post footer metadata content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_license' => array(
			'name' => 'post_footer_license',
			'title' => __( 'Post Footer License', 'oenology-hooks' ),
			'description' => __( 'Add post footer license content.', 'oenology-hooks' ),
			'type' => 'Filter',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_footer_after' => array(
			'name' => 'post_footer_after',
			'title' => __( 'Post Footer After', 'oenology-hooks' ),
			'description' => __( 'Output content after the post footer content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_footer',
			'tab' => 'post',
			'default' => false
		),
		'post_comments_before' => array(
			'name' => 'post_comments_before',
			'title' => __( 'Post Comments Before', 'oenology-hooks' ),
			'description' => __( 'Output content before the post comments content.', 'oenology-hooks' ),
			'type' => 'Action',
			'section' => 'post_comments',
			'tab' => 'post',
			'default' => false
		),
		'post_comments_after' => array(
			'name' => 'post_comments_after',
			'title' => __( 'Post Comments After', 'oenology-hooks' ),
			'description' => __( 'Output content after the post comments content.', 'oenology-hooks' ),
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
			__( 'The Oenology Hooks Plugin requires the Oenology Theme, and should only be run when the Oenology Theme is active. It is used to configure action and filter hooks specific to Oenology.', 'oenology-hooks' ),
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
			$filtermethod = $hookname . '_filter_method';
			$defaults[$filtermethod] = 'replace';
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
	$oenology_hooks_admin_hook = add_theme_page( __( 'Oenology Hooks', 'oenology_hooks' ), __( 'Oenology Hooks', 'oenology-hooks' ), 'edit_theme_options', 'oenology-hooks', 'oenology_hooks_page');
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
			'title' => __( 'Extent', 'oenology-hooks' ),
			'sections' => array(
				'extent' => array(
					'name' => 'extent',
					'title' => __( 'Site Extent Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content before and after all of the site content.', 'oenology-hooks' )
				)
			)
		),
        'headerfooter' => array(
			'name' => 'headerfooter',
			'title' => __( 'Header/Footer', 'oenology-hooks' ),
			'sections' => array(
				'header' => array(
					'name' => 'header',
					'title' => __( 'Site Header Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the Site Header.', 'oenology-hooks' )
				),
				'footer' => array(
					'name' => 'footer',
					'title' => __( 'Site Footer Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the Site Footer.', 'oenology-hooks' )
				)
			)
		),
		'loop' => array(
			'name' => 'loop',
			'title' => __( 'Loop', 'oenology-hooks' ),
			'sections' => array(
				'loop_header' => array(
					'name' => 'loop_header',
					'title' => __( 'Loop Header Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the Loop Header.', 'oenology-hooks' )
				),
				'loop_footer' => array(
					'name' => 'loop_footer',
					'title' => __( 'Loop Footer Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the Loop footer.', 'oenology-hooks' )
				)
			)
		),
		'post' => array(
			'name' => 'post',
			'title' => __( 'Post', 'oenology-hooks' ),
			'sections' => array(
				'post' => array(
					'name' => 'post',
					'title' => __( 'Post Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content before/after each Post. These are global settings. To modify settings for a specific post, see the post edit screen.', 'oenology-hooks' )
				),
				'post_header' => array(
					'name' => 'post_header',
					'title' => __( 'Post Header Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the header of each Post.', 'oenology-hooks' )
				),
				'post_entry' => array(
					'name' => 'post_entry',
					'title' => __( 'Post Entry Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in each Post entry.', 'oenology-hooks' )
				),
				'post_footer' => array(
					'name' => 'post_footer',
					'title' => __( 'Post Footer Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the footer of each Post.', 'oenology-hooks' )
				),
				'post_comments' => array(
					'name' => 'post_comments',
					'title' => __( 'Post Comments Hooks', 'oenology-hooks' ),
					'description' => __( 'These hooks output content in the comments section of each Post.', 'oenology-hooks' )
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
    			echo '<div class="updated"><p>' . __( 'Hooks settings updated successfully.', 'oenology-hooks' ) . '</p></div>';
		} ?>
	
		<form action="options.php" method="post">
		<?php 
			settings_fields( 'plugin_oenology_hooks_settings' );
			do_settings_sections( $settings_section );
		?>
			<input name="plugin_oenology_hooks_settings[submit-<?php echo $currenttab; ?>]" type="submit" class="button-primary" value="<?php _e( 'Save Settings', 'oenology-hooks' ); ?>" />
			<input name="plugin_oenology_hooks_settings[reset-<?php echo $currenttab; ?>]" type="submit" class="button-secondary" value="<?php _e( 'Reset Defaults', 'oenology-hooks' ); ?>" />
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
add_action( 'admin_init', 'oenology_hooks_register_settings' );

/**
 * Apply Global User Hook Settings
 * 
 * Apply user-defined global content to the
 * custom Oenology Theme action and filter 
 * hooks.
 */
function oenology_hooks_add_callbacks() {
	global $oenology_hooks;
	$oenology_hooks = get_option( 'plugin_oenology_hooks_settings' );
	if ( false === $oenology_hooks ) {
		return;
	}
	$allhooks = oenology_hooks_get_hooks();
	foreach ( $allhooks as $hook ) {
		$hookslug = $hook['name'];
		if ( isset( $oenology_hooks[$hookslug] ) && false != $oenology_hooks[$hookslug] && '' != $oenology_hooks[$hookslug] ) {
			$hookname = 'oenology_hook_' . $hookslug;
			$hooktype = $hook['type'];
			$callback = false;
			/*
			if ( 'Filter' == $hooktype ) {
				$hookhide = $hookslug . '_hide';
				if ( true == $oenology_hooks[$hookhide] ) {
					$callback = '__return_false';
				} else {
					$filterslug = $hookslug . '_filter_method';
					$filtermethod = ( isset( $oenology_hooks[$filterslug] ) ? $oenology_hooks[$filterslug] : false );
					$output = $oenology_hooks[$hookslug];
					if ( 'before' == $filtermethod ) {
						add_filter( $hookname, create_function( '$input', 'return ' . $oenology_hooks[$filterslug] . ';' ) );
					} else if ( 'after' == $filtermethod ) {
						add_filter( $hookname, create_function( '$input', 'return ' . $oenology_hooks[$filterslug] . ';' ) );
					} else if ( 'replace' == $filtermethod ) {
						add_filter( $hookname, create_function( '$input', 'return ' . $oenology_hooks[$filterslug] . ';' ) );
					} else {
						return;
					}
				}
			} else 
			*/
			if ( 'Action' == $hooktype ) {
				$output = $oenology_hooks[$hookslug];
				$callback = create_function( '', 'echo' . var_export( $output, true ) . ';' );
				add_action( $hookname, $callback );
			}
		}
	}
}
add_action( 'init', 'oenology_hooks_add_callbacks' );
?>