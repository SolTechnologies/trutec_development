<?php
/**
 * SCREETS © 2016
 *
 * Upgrade functions
 *
 * COPYRIGHT © 2016 Screets d.o.o. All rights reserved.
 * This  is  commercial  software,  only  users  who have purchased a valid
 * license  and  accept  to the terms of the  License Agreement can install
 * and use this program.
 *
 * @package Live Chat
 * @author Screets
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Upgrade the plugin
 *
 * @since Live Chat (2.0)
 * @return void
 */
function fn_schat_upgrade( $last_version ) {

	global $wpdb, $SChat;;

	// Update version
	update_option( 'schat_version', SLC_VERSION );

	// Activate the plugin
	$SChat->activate();

	// 1.4.3 or older versions
	if( version_compare( $last_version, '1.4.3', '<=' ) ) {

		// Change all "cx_offline_msg" post types with "schat_offline_msg"
		$wpdb->update( $wpdb->posts, array( 'post_type' => 'schat_offline_msg' ), array( 'post_type' => 'cx_offline_msg' ), array( '%s' ), array( '%s' ) );

		// Get old options
		$old_opts = get_option('screetsschat-opts');

		// Transfer old options to new one
		if( !empty( $old_opts ) ) {
			$SChat->opts->setInternalAdminPageOption( 'site-name', @$old_opts['site_name'] );
			$SChat->opts->setInternalAdminPageOption( 'site-url', @$old_opts['site_url'] );
			$SChat->opts->setInternalAdminPageOption( 'site-email', @$old_opts['admin_emails'] );
			$SChat->opts->setInternalAdminPageOption( 'site-logo', @$old_opts['default_avatar'] );
			
			$SChat->opts->setInternalAdminPageOption( 'avatar-size', @$old_opts['avatar_size'] );
			$SChat->opts->setInternalAdminPageOption( 'avatar-radius', @$old_opts['avatar_radius'] );
			
			$SChat->opts->setInternalAdminPageOption( 'btn-size', @$old_opts['btn_width'] );
			$SChat->opts->setInternalAdminPageOption( 'btn-title-online', @$old_opts['when_online'] );
			$SChat->opts->setInternalAdminPageOption( 'btn-title-offline', @$old_opts['when_offline'] );

			$SChat->opts->setInternalAdminPageOption( 'prechat-greeting', @$old_opts['prechat_msg'] );
			$SChat->opts->setInternalAdminPageOption( 'offline-greeting', @$old_opts['offline_body'] );
			$SChat->opts->setInternalAdminPageOption( 'welcome-msg', @$old_opts['welc_msg'] );
			$SChat->opts->setInternalAdminPageOption( 'str-reply-ph', @$old_opts['popup_reply_ph'] );
			
			$SChat->opts->setInternalAdminPageOption( 'primary-color', @$old_opts['primary_color'] );
			$SChat->opts->setInternalAdminPageOption( 'link-color', @$old_opts['link_color'] );
			$SChat->opts->setInternalAdminPageOption( 'popup-size', @$old_opts['widget_width'] );
			$SChat->opts->setInternalAdminPageOption( 'widget-pos', @$old_opts['widget_position'] );

			// Save options
			$SChat->opts->saveInternalAdminPageOptions();
		}

		// Delete old database data
		delete_option( 'cx_version' );
		delete_option( 'cx_error' );
		delete_option( 'cx_security_last_update' );
		delete_option( 'screetsschat-opts' );

	}

}
