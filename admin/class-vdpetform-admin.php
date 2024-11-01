<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       Vergelijkdirect.com
 * @since      1.0.0
 *
 * @package    Vdpetform
 * @subpackage Vdpetform/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Vdpetform
 * @subpackage Vdpetform/admin
 * @author     Vergelijkdirect.com <jesse@vergelijkdirect.com>
 */
class Vdpetform_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	
	/**
	 * Admin screen.
	 *
	 * @since    3.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function vergelijkdirect_main_page() {
		?>
			<div id="adminApp" class="wrap">
		<?php
		if (!isset($_GET['section'])) {
			$forms = array();
			$args = array( 'post_type' => 'vergelijkdirect-form', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				$forms[] = array('title' => get_the_title(), 'id' => get_the_ID(), 'content' => get_the_content());
			endwhile;
			?>
				<overview posts='<?php echo json_encode($forms); ?>'></overview>
			<?php
		} else if ($_GET['section'] == 'edit') {
			$form_id = $_GET['form_id'];
			$form_data = $this->vergelijkdirect_get_form_data($form_id);
			?>
				<edit formdata='<?php echo json_encode($form_data[0]); ?>'></edit>
			<?php
		} else if ($_GET['section'] == 'create') {
			?>
				<create></create>
			<?php
		} else if ($_GET['section'] == 'delete') {
			$form_id = $_GET['form_id'];
			if(isset($form_id)) {
				$this->vergelijkdirect_delete_form($form_id);
			}
		}
		?>
			</div>
		<?php
		$this->vergelijkdirect_form_save_options();
		$this->vergelijkdirect_create_form();
	}
	/**	
	 * Remove function
	 *
	 * @since    3.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function vergelijkdirect_delete_form($form_id) {
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms";
		$wp_posts = $wpdb->prefix . "posts";
		$wpdb->get_results( "DELETE FROM $table_name WHERE form_id = $form_id" );
		$wpdb->get_results( "DELETE FROM $wp_posts WHERE id = $form_id" );
		?>
		<script>
			location.href = "/wp-admin/admin.php?page=vergelijkdirect_form"
		</script>
		<?php
	}
	/**	
	 * save function
	 *
	 * @since    3.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function vergelijkdirect_form_save_options() {
		$post_data = $_POST;
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms";
		$data = array(
			'card_padding' => $post_data['card_padding'],
			'border_color' => $post_data['border_color'],
			'form_style' => $post_data['form_style'],
			'border_thickness' => $post_data['border_thickness'],
			'card_color' => $post_data['card_color'],
			'text_color' => $post_data['text_color'],
			'card_border_radius' => $post_data['card_border_radius'],
			'btn_text' => $post_data['btn_text'],
			'btn_text_color' => $post_data['btn_text_color'],
			'btn_color' => $post_data['btn_color'],
			'btn_color_hover' => $post_data['btn_color_hover'],
			'btn_border_radius' => $post_data['btn_border_radius'],
		);
		if (isset($post_data['save_options'])){
			$wpdb->update( 
				$table_name, 
				$data, 
				array( 'form_id' => $post_data['form_id'] )
			);
			?>
				<script>
					location.href = "/wp-admin/admin.php?page=vergelijkdirect_form&section=edit&form_id=<?php echo $post_data['form_id']; ?>"
				</script>
			<?php
		}
	}
	/**	
	 * Get form data
	 *
	 * @since    3.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function vergelijkdirect_get_form_data($current_form) {
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms";
		return $wpdb->get_results( "SELECT * FROM $table_name WHERE form_id = $current_form" );
	}

	/**	
	 * create form
	 *
	 * @since    3.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function vergelijkdirect_create_form() {
		$post_data = $_POST;
		
		// return;
		global $wpdb;
		$table_name = $wpdb->prefix . "vdforms";
		if (isset($post_data['create_form'])) {
			$post_id = wp_insert_post(
				array(
					'post_title' => __($post_data['name'], 'vergelijkdirect-form'),
					'post_content' => __($post_data['description'], 'vergelijkdirect-form'),
					'post_type' => 'vergelijkdirect-form',
					'post_status' => 'Private'
				)
			);
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

			$data = array(
				'form_id' => $post_id,
				'date' => date("Y-m-d h:i:s"),	
				'form_type' => 1,
				'form_name' => $forms[$post_data['type']]['name'],
				'form_type' => $forms[$post_data['type']]['form_type'] ?: 1,
				'card_padding' => 10,
				'border_color' => '#ffffff',
				'border_thickness' => 0,
				'card_color' => '#ea1360',
				'text_color' => '#ffffff',
				'card_border_radius' => 0,
				'btn_text' => 'Vergelijken',
				'btn_text_color' =>'#ffffff',
				'btn_color' => '#2196f3',
				'btn_color_hover' => '#167ece',
				'btn_border_radius' => 0,
			); 
	
			$wpdb->insert( $table_name, $data);
			?>
			<script>
				location.href = "/wp-admin/admin.php?page=vergelijkdirect_form&section=edit&form_id=<?php echo $post_id; ?>"
			</script> <?php
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function vergelijkdirect_enqueue_styles() {
		wp_enqueue_style( 
			$this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vdpetform-admin.css', array(), $this->version, 'all' 
		);
		wp_enqueue_style( 
			$this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vdpetform-admin-colorpicker.css', array(), $this->version, 'all' 
		);
	}
	
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	
	public function vergelijkdirect_enqueue_scripts( $hook_suffix ) {
		wp_enqueue_style( 
			'wp-color-picker' 
		);
		wp_enqueue_script( 
			$this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vdpetform-admin.js', array( 'jquery', 'wp-color-picker' ), false, false 
		);
		wp_enqueue_script( 
			$this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/vdpetform-admin.js', array( 'wp-color-picker' ), false, true 
		);
	}

	/**
 	* Register the administration menu for this plugin into the WordPress Dashboard menu.
	*
	* @since    3.1.0
	*/

	public function vergelijkdirect_add_plugin_admin_menu() {

		global $submenu;
		$menuName = __('Vergelijkdirect.com', 'vergelijkdirect-form');
		
        
        add_menu_page(
            $menuName,
			$menuName,
			7,
            'vergelijkdirect_form',
			array($this, 'vergelijkdirect_main_page'),
			'dashicons-feedback',
            25
		);

		$submenu['vergelijkdirect_form']['all_forms'] = array(
			__('Alle formulieren', 'vergelijkdirect-form'),
            7,
            'admin.php?page=vergelijkdirect_form',
		);

		$submenu['vergelijkdirect_form']['create_form'] = array(
			__('Maak vergelijker', 'vergelijkdirect-form'),
            7,
            'admin.php?page=vergelijkdirect_form',
		);
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	public function vergelijkdirect_add_setting_link( $links ) {
		
		$settings_link = array(
			'<a href="/wp-admin/admin.php?page=vergelijkdirect_form"></a>',
		);
		return array_merge(  $settings_link, $links );
	}
}?>