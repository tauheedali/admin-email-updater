<?php
/*
Plugin Name: Admin Email Updater
Description: Updates admin email without sending confirmation email
Version: 0.1.0
*/

remove_action( 'add_option_new_admin_email', 'update_option_new_admin_email' );
remove_action( 'update_option_new_admin_email', 'update_option_new_admin_email' );

		/**
		 * Disable the confirmation notices when an administrator
		 * changes their email address.
		 *
		 * @see http://codex.wordpress.com/Function_Reference/update_option_new_admin_email
		 */
		function msh_update_option_new_admin_email( $old_value, $value ) {
			
			update_option( 'admin_email', $value );
			
		}
		/*
		 * Change description text via jquery
		 *
		 */
		function update_description($hook){
			if( 'options-general.php' != $hook){
				return;
			}
			wp_enqueue_script('jquery', true);
			wp_enqueue_script('new_descr',
							  plugins_url('/js/new-descripton.js' , __FILE__),
							  array(jquery),
							  true
							 );			

		}
add_filter('admin_enqueue_scripts', 'update_description' );
add_action( 'add_option_new_admin_email', 'msh_update_option_new_admin_email', 10, 2 );
add_action( 'update_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
?>