<?php

/*
 * Plugin Name: Language Downloader
 * Plugin URI:  http://www.brandonkraft.com/
 * Description: Allows on-the-fly language additions
 * Version:     0.1
 * Author:      Brandon Kraft
 * Author URI:  http://www.brandonkraft.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: genesis-enews-extended
 * Domain Path: /languages
 */

function ld_add_settings_menu(){
	add_options_page( 'Language Downloader', 'Language Downloader', 'manage_options', 'ld_language_downloader', 'ld_options_page' );
}

add_action( 'admin_menu', 'ld_add_settings_menu' );

function ld_options_page(){
	require_once( ABSPATH . 'wp-admin/includes/translation-install.php' );

	if ( ! wp_can_install_language_pack() ) {
		echo "You cannot install language packs. Sorry :-(";
		return;
	}

	if ( isset( $_GET['lang'] ) ) {
		$langtoadd = $_GET['lang'];
		wp_download_language_pack( $langtoadd );
	}

	echo "Placeholder for more goodies. For now, add <code>&lang=[locale]</code> to the URL to download that language, e.g. <code>wp-admin/options-general.php?page=ld_language_downloader&lang=fr_FR</code> to download French.";

}