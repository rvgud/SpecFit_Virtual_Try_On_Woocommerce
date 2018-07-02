<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/admin
 * @author     DugudLabs <ravindrashekhawat5876@gmail.com>
 */
class Eyewear_virtual_try_on_wordpress_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eyewear_virtual_try_on_wordpress_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eyewear_virtual_try_on_wordpress_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		
		wp_enqueue_style('thickbox');
		wp_enqueue_style('bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eyewear_virtual_try_on_wordpress-admin.css', array(), $this->version, 'all' );
    


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Eyewear_virtual_try_on_wordpress_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Eyewear_virtual_try_on_wordpress_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eyewear_virtual_try_on_wordpress-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( "load_core_function", plugin_dir_url( __FILE__ ) . 'js/load_core_function.js', $this->version, false );
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('bootstrap-js', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', ['jquery']);

	}
public function add_menu() {
     add_menu_page("SpecFit","SpecFit", "manage_options", "tryonmenu",  'show_admin_menu', $icon_url = plugin_dir_url( __FILE__ ) . 'css/specfit.svg', $position = null );
     add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes_transparent_image' ) );
     add_action( 'save_post', array( $this, 'save_transparent_image' )); 
 }
 public function save_transparent_image($post_id){
     $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'case_study_bg_nonce' ] ) && wp_verify_nonce( $_POST[ 'case_study_bg_nonce' ], 'case_study_bg_submit' ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce  ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'my_image_URL' ] ) ) {
        update_post_meta( $post_id, 'try_on_image_rvgud', $_POST[ 'my_image_URL' ] );
          //update_post_meta( $post_id, 'try_on_image_rvgud', plugin_dir_url( __FILE__ ) . 'images/glasses.png' );
    }    
    }
                
 public function add_meta_boxes_transparent_image($post_types  ) {
    $post_types = array('product');     //limit meta box to certain post types
    global $post;
    $product = get_product( $post->ID );
   if ($post->post_type=='product'){
        add_meta_box(
            'wf_child_letters'
            ,__( 'Try On Image', 'woocommerce' )
            ,array( $this, 'render_meta_box_content' )
            ,$post_type
            ,'advanced'
            ,'high'
        );
    }
}
    public function render_meta_box_content(){
        global $post;
		$url =get_post_meta($post->ID,'try_on_image_rvgud', true);  ?>
    	<input hidden="hidden" id="my_image_URL" name="my_image_URL" type="text" value="<?php echo $url;?>"  style="width:400px;" />

		<?php if($url==null || $url ==''){?>
		<img src="<?php echo $url;?>" style="width:200px;display:none;" id="picsrc" />
		<a onclick="upload_try_on_image_SpecFit();" id="my_upl_button">Set TryOn Image</a>
		<?php }
		else {?>
		<img src="<?php echo $url;?>" style="width:200px;" id="picsrc" />
		<a id="my_upl_button">Change</a>
		<a onclick="remove_try_on_image();">Remove</a>
		 <?php  } 
   

	}
}
    
   function show_admin_menu() { 
    include_once plugin_dir_path(__FILE__).'partials/eyewear_virtual_try_on_wordpress-admin-display.php';
     //include plugin_dir_url(__FILE__)."partials/eyewear_virtual_try_on_wordpress-admin-display.php";
 }
 ?>
