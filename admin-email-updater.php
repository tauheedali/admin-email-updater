<?php
/*
Plugin Name:       Admin Email Updater
Plugin URI:        https://github.com/tauheedali/admin-email-updater
Description:       Updates admin email without sending confirmation email
Version:           1.0.0
Author:            Tauheed Ali For Mainstreethost
License:           GPL-2.0+
License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-email-updater.php';


function run_admin_email_updater() {
	$updater = new Admin_Email_Updater();
	$updater->run();
}

run_admin_email_updater();

?>