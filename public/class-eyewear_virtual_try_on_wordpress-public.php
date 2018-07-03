<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.dugudlabs.com
 * @since      1.0.0
 *
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Eyewear_virtual_try_on_wordpress
 * @subpackage Eyewear_virtual_try_on_wordpress/public
 * @author     DugudLabs <ravindrashekhawat5876@gmail.com>
 */
class Eyewear_virtual_try_on_wordpress_Public {

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
	public function start(){
			add_action( 'woocommerce_single_product_summary', 'show_button', 32 ,0 );
			add_action( 'woocommerce_after_shop_loop_item', 'show_loop_button', 10);
			add_action( 'woocommerce_after_shop_loop', 'show_try_on_popup', 10);
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/eyewear_virtual_try_on_wordpress-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'jquery', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'bootstrap-res',plugin_dir_url( __FILE__ ) . 'css/bootstrap-responsive.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name.'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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
		wp_enqueue_script('jquery');
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/eyewear_virtual_try_on_wordpress-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'htmtocanvas_tryon', plugin_dir_url( __FILE__ ) . 'js/html2canvas.min.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name.'bootstrapjs', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js');
        //wp_enqueue_script( $this->plugin_name.'jqueryuijs', plugin_dir_url( __FILE__ ) . 'js/jquery-ui.js');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('jquery-ui-mouse');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-droppable');
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery-ui-tooltip');
        wp_enqueue_script( $this->plugin_name.'jqueryuitouchjs', plugin_dir_url( __FILE__ ) . 'js/jquery.ui.touch-punch.min.js',array( 'jquery-ui-mouse','jquery-ui-widget' ));
        wp_enqueue_script("load_core_functions", plugin_dir_url(__FILE__) . 'js/load_core_functions.js', false );

	}


}
function show_button(){
	
    global $product; 
    global $post;
    $tryOnImgUrl=get_post_meta($post->ID,'try_on_image_rvgud', true); 
    $tryOnSideImgUrl=get_post_meta($post->ID,'try_on_side_image_rvgud', true); 
    $id = $product->get_id();
    $img_url= get_the_post_thumbnail_url($product_id);
    $scode="[add_to_cart_url id='".$id."']";
    $scode = do_shortcode("[add_to_cart_url id='".$id."']");
    if($tryOnImgUrl !=null || $tryOnImgUrl !=''){
    	?>
    	<script>
    	function set_properties_glasses(name,tryon_url,try_onside_url,id){
    			document.getElementById('galssimage').src=tryon_url;
    			tryOnImgUrl=tryon_url;
    			tryOnSideImgUrl=try_onside_url;
    			document.getElementById('addtocartlink').href=id;
    			if(tryOnSideImgUrl==''){
    			var side_btn = document.getElementById('side_btn');
				if (side_btn === null){

				}
				else{
					var side_btnjquery = $('#side_btn');
					side_btnjquery.css("display","none");
				}
			}
    			
    	}
    	</script>
    	<button type="button" class="btn btn-info" onclick="set_properties_glasses('Rayban','<?php echo $tryOnImgUrl;?>','<?php echo $tryOnSideImgUrl;?>','<?php echo $scode;?>');" data-toggle="modal" data-target="#TryOnModal">TryOn</button>
    	<?php
    	include_once plugin_dir_path(__FILE__).'partials/eyewear_virtual_try_on_wordpress-public-display.php';
    }
   
}
function show_try_on_popup(){
	global $file_path;
    include_once plugin_dir_path(__FILE__).'partials/eyewear_virtual_try_on_wordpress-public-display.php';
    
   
}
function show_loop_button(){
	global $product; 
    global $post;
    $tryOnImgUrl=get_post_meta($post->ID,'try_on_image_rvgud', true); 
    $tryOnSideImgUrl=get_post_meta($post->ID,'try_on_side_image_rvgud', true); 
    $id = $product->get_id();
    $img_url= get_the_post_thumbnail_url($product_id);

    $scode="[add_to_cart_url id='".$id."']";
    $scode = do_shortcode("[add_to_cart_url id='".$id."']");
    if($tryOnImgUrl !=null || $tryOnImgUrl !=''){
    	?>
    	<script>
    	function set_properties_glasses(name,tryon_url,try_onside_url,id){
    			document.getElementById('galssimage').src=tryon_url;
    			tryOnImgUrl=tryon_url;
    			tryOnSideImgUrl=try_onside_url;
    			productid=id;
    			document.getElementById('addtocartlink').href=id;
    			if(tryOnSideImgUrl==''){
    			var side_btn = document.getElementById('side_btn');
				if (side_btn === null){

				}
				else{
					var side_btnjquery = $('#side_btn');
					side_btnjquery.css("display","none");
				}
			}
    	}
    	</script>
    	<button type="button" class="btn btn-info" onclick="set_properties_glasses('Rayban','<?php echo $tryOnImgUrl;?>','<?php echo $tryOnSideImgUrl;?>','<?php echo $scode;?>');" data-toggle="modal" data-target="#TryOnModal">TryOn</button>
    	<?php
    }
}
