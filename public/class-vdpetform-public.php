<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       Vergelijkdirect.com
 * @since      1.0.0
 *
 * @package    Vdpetform
 * @subpackage Vdpetform/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Vdpetform
 * @subpackage Vdpetform/public
 * @author     Vergelijkdirect.com <jesse@vergelijkdirect.com>
 */
class Vdpetform_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function vergelijkdirect_enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vdpetform-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function vergelijkdirect_enqueue_scripts() {
		wp_enqueue_script( 'public', plugin_dir_url( __FILE__ ) . 'js/vdpetform-public.js', array(), $this->version, true);
	}

	/**
	 * Get current form from database
	 *
	 * @since    2.0.0
	 */
	public function vergelijkdirect_get_current_form($current_form) {
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms";
		return $wpdb->get_results( "SELECT * FROM $table_name WHERE form_id = $current_form" );
	}

	/**
	 * Shortcode function that creates div for vue to work on
	 *
	 * @since    1.0.0
	 */
	public function vergelijkdirect_dynamic_shortcode( $atts ) {
		$atts = shortcode_atts(
			array(
				'id' => '47',
				'type' => 'vertical',
				'width' => '300px',
				'align' => 'none'
			), 
			$atts, 'vd_form' 
		);
		
		$data = $this->vergelijkdirect_get_current_form($atts['id']);
		$form_id = $data[0]->form_type;

		$vue_atts = esc_attr( json_encode( [
			'id' => $atts['id'],
			'type' => $atts['type'],
			'width' => $atts['width'],
			'align' => $atts['align'],
			'data' => $data,
			'formId' => $form_id
		] ) );

		return "<div vd-form-atts='{$vue_atts}'>Loading poll...</div>";
		
	}

	/**
	 * Creates schortcode
	 *
	 * @since    1.0.0
	*/
	public function vergelijkdirect_shortcodes() {
		add_shortcode( 'vd_form', array( $this, 'vergelijkdirect_dynamic_shortcode') );
	}
}