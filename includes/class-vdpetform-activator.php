<?php

/**
 * Fired during plugin activation
 *
 * @link       Vergelijkdirect.com
 * @since      1.0.0
 *
 * @package    Vdpetform
 * @subpackage Vdpetform/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Vdpetform
 * @subpackage Vdpetform/includes
 * @author     Vergelijkdirect.com <jesse@vergelijkdirect.com>
 */
class Vdpetform_Activator {

	/**
	 * Add database
	 *
	 * Creates a database for the plugin
	 *
	 * @since    1.0.0
	 */
	
	public static function activate() {
		self::create_database_table();
		self::create_database_rows();
	}	

	public static function create_database_rows() {
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms";
		$form_count = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );
		// Checks if there already are database rows
		if($form_count == 0) {
			// Form Types
			$forms = [
				1 => [
					'name' => 'Dierenverzekering vergelijken',
					'form_type' => '1'
				],
				2 => [
					'name' => 'Fietsverzekering vergelijken',
					'form_type' => '2'
				],
				3 => [
					'name' => 'Motorverzekering vergelijken',
					'form_type' => '3'
				],
			];

			foreach ($forms as $form) {
				// Create wordpress custom post
				$post_id = wp_insert_post(
					array(
						'post_title' => __($form['name'], 'vergelijkdirect-form'),
						'post_content' => __('Een standaard vergelijker voor '. $form['name'], 'vergelijkdirect-form'),
						'post_type' => 'vergelijkdirect-form',
						'post_status' => 'Private'
					)
				);
				// Sets basic form styling into array
				$data = array(
					'form_id' => $post_id,
					'date' => date("Y-m-d h:i:s"),	
					'form_type' => 1,
					'form_name' => $form['name'],
					'form_type' => $form['form_type'] ?: 1,
					'card_padding' => $post_data['card_padding'] ?: 10,
					'border_color' => $post_data['border_color'] ?: '#ffffff',
					'border_thickness' => $post_data['border_thickness'] ?: 0,
					'card_color' => $post_data['card_color'] ?: '#ea1360',
					'text_color' => $post_data['text_color'] ?: '#ffffff',
					'card_border_radius' => $post_data['card_border_radius'] ?: 0,
					'btn_text' => $post_data['btn_text'] ?: 'Vergelijken',
					'btn_text_color' => $post_data['btn_text_color'] ?: '#ffffff',
					'btn_color' => $post_data['btn_color'] ?: '#2196f3',
					'btn_color_hover' => $post_data['btn_color_hover'] ?: '#167ece',
					'btn_border_radius' => $post_data['btn_border_radius'] ?: 0,
				); 
				// Inserts the form styling and custom post id into table
				$wpdb->insert( $table_name, $data);	
			}
		}
	}

	public static function create_database_table() {
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms"; 
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			form_id mediumint(9) NOT NULL,
			form_type mediumint(9) NOT NULL,
			form_style mediumint(9) NOT NULL,
			form_name tinytext NOT NULL,
			card_padding mediumint(9) NOT NULL,
			border_color tinytext NOT NULL,
			border_thickness mediumint(9) NOT NULL,
			card_color tinytext NOT NULL,
			text_color tinytext NOT NULL,
			card_border_radius mediumint(9) NOT NULL,
			btn_text tinytext NOT NULL,
			btn_text_color tinytext NOT NULL,
			btn_color tinytext NOT NULL,
			btn_color_hover tinytext NOT NULL,
			btn_border_radius mediumint(9) NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
}
