<?php

class Admin_Email_Updater_Admin{	
	
	protected $version;
	
	public function __construct($version){
		$this->version = $version;
	}
	
	public function enqueue_scripts(){
			wp_enqueue_script('jquery', true);
			wp_enqueue_script('new_descr', 
							  plugin_dir_url( __FILE__ ).'js/new-descripton.js', 
							  array('jquery'), 
							  true, 
							  $this->version
							 );
	}
	
	public function update_option_new_admin_email( $old_value, $value ) {	
			//Disable Worpress Email Change Email
			remove_action( 'add_option_new_admin_email', 'update_option_new_admin_email' );
			remove_action( 'update_option_new_admin_email', 'update_option_new_admin_email' );
		
			//Diisable Confirmation Emails
			apply_filters( 'send_email_change_email', false, "", "" ); //Cancels Confirmation Email - Confirm New
			remove_action( 'update_option_admin_email', 'wp_site_admin_email_change_notification', 10, 3 ); //Cancels Confirmation Email - Confirm Email Change
			
			//Update Admin Email
			$email = get_option( 'new_admin_email' );	
			update_option( 'admin_email', $email );					
		}	
}
?>