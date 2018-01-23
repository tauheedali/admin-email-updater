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
			$email = get_option( 'new_admin_email' );
			apply_filters( 'send_email_change_email', false, $user, $userdata ); //Cancels Confirmation Email
			update_option( 'admin_email', $email );			
		}
	
	public function cancel_confirmation_email(){
		return false;
	}
	
}
?>