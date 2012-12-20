<?php
/**
 * Oenology Hooks Plugin Settings API
 *
 * This file defines the settings for the 
 * Oenology Hooks Plugin. These settings 
 * provide a UI for manipulation of the 
 * custom hooks available in the Oenology
 * Theme.
 * 
 * @package 	Oenology
 * @subpackage	Oenology Hooks
 * @copyright	Copyright (c) 2011, Chip Bennett
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Oenology 2.0
 */

/**
 * Register Oenology Hooks Plugin Settings
 * 
 * Register plugin_oenology_hooks_settings array
 * to hold all Oenology Hooks Plugin settings.
 */
register_setting( 'plugin_oenology_hooks_settings', 'plugin_oenology_hooks_settings', 'oenology_hooks_settings_validate' );

/**
 * Separate settings by tab
 */
function oenology_hooks_get_settings_by_tab() {
	$tabs = oenology_hooks_get_settings_page_tabs();
	$tabnames = array();
	foreach ( $tabs as $tab ) {
		$tabname = $tab['name'];
		$tabnames[] = $tabname;
	}
	$settingsbytab = $tabnames;
	$hooks = oenology_hooks_get_hooks();
	foreach ( $hooks as $hook ) {
		$hooktab = $hook['tab'];
		$hookname = $hook['name'];
		$settingsbytab[$hooktab][] = $hookname;
	}
	return $settingsbytab;
}

/**
 * Validate/Sanitize User-Input Settings
 * 
 * Validate/sanitize/Whitelist User-Input Data 
 * before updating Plugin settings in the 
 * database.
 */
function oenology_hooks_settings_validate( $input ) {
	//var_dump( $input ); die;

	$valid_input = get_option( 'plugin_oenology_hooks_settings' );
	$settingsbytab = oenology_hooks_get_settings_by_tab();
	$defaulthooks = oenology_hooks_get_hooks();

	// Determine what type of submit was input
	$submittype = ( 
		(  ! empty( $input['submit-extent'] ) 
		|| ! empty( $input['submit-headerfooter'] ) 
		|| ! empty( $input['submit-loop'] )
		|| ! empty( $input['submit-post'] ) 
		) ? 'submit' : 'reset' );
	// Determine what tab was input
	$submittab = 'extent';
	if ( ! empty( $input['submit-headerfooter'] ) || ! empty($input['reset-headerfooter'] ) ) {
		$submittab = 'headerfooter';
	} elseif ( ! empty( $input['submit-loop'] ) || ! empty($input['reset-loop'] ) ) {
		$submittab = 'loop';
	} elseif ( ! empty( $input['submit-post'] ) || ! empty($input['reset-post'] ) ) {
		$submittab = 'post';
	}
	// Get settings by tab
	$tabsettings = $settingsbytab[$submittab];
	// Loop through each tab setting
	foreach ( $tabsettings as $setting ) {
		// If submit, validate/sanitize $input
		if ( 'submit' == $submittype ) {
			$hookdetails = false;
			foreach ( $defaulthooks as $hook ) {
				if ( $hook['name'] == $setting ) {
					$hookdetails = $hook;
				}
			}
			$valid_input[$setting] = wp_filter_kses( $input[$setting] );
			if ( 'Filter' == $hookdetails['type'] ) {
				$hookhide = $setting . '_hide';
				$valid_input[$hookhide] = ( ( isset( $input[$hookhide] ) && $hookhide == $input[$hookhide] ) ? true : false );
				$filtermethod = $setting . '_filter_method';
				$valid_input[$filtermethod] = ( isset( $input[$filtermethod] ) && in_array( $input[$filtermethod], array( 'before', 'after', 'replace' ) ) ? $input[$filtermethod] : 'replace' );
			}
		} elseif ( 'reset' == $submittype ) {
			$hook = $defaulthooks[$setting];
			$hookdefault = $hook['default'];
			$valid_input[$setting] = $hookdefault;
		}
	}
	return $valid_input;
}

/**
 * Globalize the variable that holds 
 * the Settings Page tab definitions
 * 
 * @global	array	Settings Page Tab definitions
 */
global $oenology_hooks_tabs;
$oenology_hooks_tabs = oenology_hooks_get_settings_page_tabs();
/**
 * Call add_settings_section() for each Settings Section
 */
foreach ( $oenology_hooks_tabs as $tab ) {
	$tabname = $tab['name'];
	$tabsections = $tab['sections'];
	foreach ( $tabsections as $section ) {
		$sectionname = $section['name'];
		$sectiontitle = $section['title'];
		// Add settings section
		add_settings_section(
			'oenology_hooks_' . $sectionname . '_section',
			$sectiontitle,
			'oenology_hooks_sections_callback',
			'oenology_hooks_' . $tabname . '_tab'
		);
	}
}
/**
 * Callback for add_settings_section()
 * 
 * Generic callback to output the section text
 * for each Plugin settings section. 
 * 
 * @param	array	$section_passed	Array passed from add_settings_section()
 */
function oenology_hooks_sections_callback( $section_passed ) {
	global $oenology_hooks_tabs;
	$oenology_hooks_tabs = oenology_hooks_get_settings_page_tabs();
	foreach ( $oenology_hooks_tabs as $tab ) {
		$tabname = $tab['name'];
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $section ) {
			$sectionname = $section['name'];
			$sectiondescription = $section['description'];
			$section_callback_id = 'oenology_hooks_' . $sectionname . '_section';
			if ( $section_callback_id == $section_passed['id'] ) {
				?>
				<p><?php echo $sectiondescription; ?></p>
				<?php
			}
		}
	}
}


/**
 * Globalize the variable that holds 
 * the hook definitions
 * 
 * @global	array	Hook definitions
 */
global $oenology_hooks;
$oenology_hooks = oenology_hooks_get_hooks();
/**
 * Call add_settings_field() for each Setting Field
 */
foreach ( $oenology_hooks as $hook ) {
	$hookname = $hook['name'];
	$hooktitle = $hook['title'];
	$hooktab = $hook['tab'];
	$hooksection = $hook['section'];
	if ( 'Action' == $hook['type'] ) {
		add_settings_field(
			'oenology_hooks_' . $hookname,
			$hooktitle,
			'oenology_hooks_setting_callback',
			'oenology_hooks_' . $hooktab . '_tab',
			'oenology_hooks_' . $hooksection . '_section',
			$hook
		);
	}
}
/**
 * Callback for add_settings_field()
 * 
 * Generic callback to output the setting field
 * for each Plugin setting. 
 * 
 * @param	array	$args	Arguments passed from add_settings_field()
 */
function oenology_hooks_setting_callback( $hook ) {
	$oenology_hooks_options = get_option( 'plugin_oenology_hooks_settings' ); 
	extract( $hook );
	$hookname = $hook['name'];
	$hooktitle = $hook['title'];
	$hookdescription = $hook['description'];
	$hooktype = $hook['type'];
	$hooktab = $hook['tab'];
	$hooksection = $hook['section'];
	$inputvalue = $name . '_hide';
	$inputname = 'plugin_oenology_hooks_settings[' . $inputvalue . ']';
	$selectvalue = $name . '_filter_method';
	$selectname = 'plugin_oenology_hooks_settings[' . $selectvalue . ']';
	$textareaname = 'plugin_oenology_hooks_settings[' . $name . ']';
	$textareavalue = $oenology_hooks_options[$name];
	/*
	if ( 'Filter' == $type ) {
		?>
		<input type="checkbox" name="<?php echo $inputname; ?>" value="<?php echo $inputvalue;?>" <?php checked( true == $oenology_hooks_options[$inputvalue]  ); ?> />
		<span>Hide <?php echo $hooktitle; ?> content?</span><br />		
		<select name="<?php echo $selectname; ?>" >
			<option <?php selected( 'before' == $selectvalue ); ?> value="before">Append Before</option>
			<option <?php selected( 'after' == $selectvalue ); ?> value="after">Append After</option>
			<option <?php selected( 'replace' == $selectvalue ); ?> value="replace">Replace</option>
		</select>
		<span><?php echo $hooktitle; ?> content filter method?</span><br />
		<?php
	}
	*/
	if ( 'Action' == $type ) {
	?>
	<span class="description"><?php echo $hooktype; ?> <?php _e( 'Hook', 'oenology-hooks' ); ?>: <?php echo $hookdescription; ?></span><br />
	<textarea name="<?php echo $textareaname; ?>" cols="80" rows="3" ><?php 
		echo esc_textarea( $textareavalue ); 
	?></textarea>	
	<?php 
	}
}