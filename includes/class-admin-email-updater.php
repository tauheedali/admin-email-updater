<?php
/*
 * Plugin Name:       Admin Email Updater
 * Plugin URI:        https://github.com/tauheedali/admin-email-updater
 * Description:       Updates admin email without sending confirmation email
 * Version:           1.0.0
 * Author:            Tauheed Ali For Mainstreethost
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
class Admin_Email_Updater{
	
	protected $loader;
	
	protected $version;	
	
	function __construct(){
		$this->version = "1.0.0";
		
		$this->load_dependencies();
		$this->define_admin_hooks();		
	}
	
	private function load_dependencies(){
		require_once plugin_dir_path(dirname( __FILE__ )).'admin/class-admin-email-updater-admin.php';
		
		require_once plugin_dir_path(dirname( __FILE__ )).'includes/class-admin-email-updater-loader.php';
		$this->loader = new Admin_Email_Updater_Loader();		
	}
	
	private function define_admin_hooks(){
		$admin = new Admin_Email_Updater_Admin($this->get_version());		
		
		$this->loader->add_action('admin_enqueue_scripts', $admin, 'enqueue_scripts');
		$this->loader->add_action('add_option_new_admin_email', $admin, 'update_option_new_admin_email');//10,2
		$this->loader->add_action('update_option_new_admin_email', $admin, 'update_option_new_admin_email');//10,2		
		
	}
	
	public function run(){
		$this->loader->run();
	}
	
	public function get_version() {
		return $this->version;
	}
	
	
}
?>