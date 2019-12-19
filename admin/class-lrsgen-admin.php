<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://google.com
 * @since      1.0.0
 *
 * @package    Lrsgen
 * @subpackage Lrsgen/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Lrsgen
 * @subpackage Lrsgen/admin
 * @author     Trevor Wagner <tmwagner66@gmail.com>
 */
class Lrsgen_Admin {

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
		 * defined in Lrsgen_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lrsgen_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/lrsgen-admin.css', array(), $this->version, 'all' );

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
		 * defined in Lrsgen_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Lrsgen_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/lrsgen-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * 
	 */
	public function createPostTypes(){

		// Create Hotels Post Type
		register_post_type( 'hotel', 
			array(
				'label'                 => __( 'Hotel', 'text_domain' ),
				'description'           => __( 'Custom Post Types for all hotel based details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Hotels', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Hotel', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Hotels', 'text_domain' ),
					'name_admin_bar'        => __( 'Hotels', 'text_domain' ),
					'archives'              => __( 'Hotel Archives', 'text_domain' ),
					'attributes'            => __( 'Hotel Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Hotel:', 'text_domain' ),
					'all_items'             => __( 'All Hotels', 'text_domain' ),
					'add_new_item'          => __( 'Add New Hotel', 'text_domain' ),
					'add_new'               => __( 'Add New Hotel', 'text_domain' ),
					'new_item'              => __( 'New Hotel', 'text_domain' ),
					'edit_item'             => __( 'Edit Hotel', 'text_domain' ),
					'update_item'           => __( 'Update Hotel', 'text_domain' ),
					'view_item'             => __( 'View Hotel', 'text_domain' ),
					'view_items'            => __( 'View Hotel', 'text_domain' ),
					'search_items'          => __( 'Search Hotels', 'text_domain' ),
					'not_found'             => __( 'Hotel Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Hotel Not found in Trash', 'text_domain' ),
					'featured_image'        => __( 'Featured Image', 'text_domain' ),
					'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
					'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
					'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
					'insert_into_item'      => __( 'Insert into Hotel', 'text_domain' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Hotel', 'text_domain' ),
					'items_list'            => __( 'Hotels list', 'text_domain' ),
					'items_list_navigation' => __( 'Hotels list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Hotels list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 10,
				'menu_icon'             => 'dashicons-business',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);

		// Create Reservations Post Type
		register_post_type( 'reservation', 
			array(
				'label'                 => __( 'Reservation', 'text_domain' ),
				'description'           => __( 'Post Type that holds reservation details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Reservations', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Reservation', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Reservations', 'text_domain' ),
					'name_admin_bar'        => __( 'Reservations', 'text_domain' ),
					'archives'              => __( 'Reservation Archives', 'text_domain' ),
					'attributes'            => __( 'Reservation Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Reservation:', 'text_domain' ),
					'all_items'             => __( 'All Reservations', 'text_domain' ),
					'add_new_item'          => __( 'Add New Reservation', 'text_domain' ),
					'add_new'               => __( 'Add New Reservation', 'text_domain' ),
					'new_item'              => __( 'New Reservation', 'text_domain' ),
					'edit_item'             => __( 'Edit Reservation', 'text_domain' ),
					'update_item'           => __( 'Update Reservation', 'text_domain' ),
					'view_item'             => __( 'View Reservation', 'text_domain' ),
					'view_items'            => __( 'View Reservations', 'text_domain' ),
					'search_items'          => __( 'Search Reservations', 'text_domain' ),
					'not_found'             => __( 'Reservation Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Reservation Not found in Trash', 'text_domain' ),
					'featured_image'        => __( 'Featured Image', 'text_domain' ),
					'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
					'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
					'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
					'insert_into_item'      => __( 'Insert into Reservation', 'text_domain' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Reservation', 'text_domain' ),
					'items_list'            => __( 'Reservations list', 'text_domain' ),
					'items_list_navigation' => __( 'Reservations list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Reservations list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor', 'thumbnail' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 15,
				'menu_icon'             => 'dashicons-menu',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);

		// Create Reservations Post Type
		register_post_type( 'room-type', 
			array(
				'label'                 => __( 'Room Types', 'text_domain' ),
				'description'           => __( 'Post Type that holds reservation details', 'text_domain' ),
				'labels'                => array(
					'name'                  => _x( 'Room Types', 'Post Type General Name', 'text_domain' ),
					'singular_name'         => _x( 'Room Type', 'Post Type Singular Name', 'text_domain' ),
					'menu_name'             => __( 'Room Types', 'text_domain' ),
					'name_admin_bar'        => __( 'Room Types', 'text_domain' ),
					'archives'              => __( 'Room Type Archives', 'text_domain' ),
					'attributes'            => __( 'Room Type Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Parent Room Type:', 'text_domain' ),
					'all_items'             => __( 'All Room Types', 'text_domain' ),
					'add_new_item'          => __( 'Add New Room Type', 'text_domain' ),
					'add_new'               => __( 'Add New Room Type', 'text_domain' ),
					'new_item'              => __( 'New Room Type', 'text_domain' ),
					'edit_item'             => __( 'Edit Room Type', 'text_domain' ),
					'update_item'           => __( 'Update Room Type', 'text_domain' ),
					'view_item'             => __( 'View Room Type', 'text_domain' ),
					'view_items'            => __( 'View Room Types', 'text_domain' ),
					'search_items'          => __( 'Search Room Types', 'text_domain' ),
					'not_found'             => __( 'Room Type Not found', 'text_domain' ),
					'not_found_in_trash'    => __( 'Room Type Not found in Trash', 'text_domain' ),
					'featured_image'        => __( 'Featured Image', 'text_domain' ),
					'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
					'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
					'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
					'insert_into_item'      => __( 'Insert into Reservation', 'text_domain' ),
					'uploaded_to_this_item' => __( 'Uploaded to this Reservation', 'text_domain' ),
					'items_list'            => __( 'Reservations list', 'text_domain' ),
					'items_list_navigation' => __( 'Reservations list navigation', 'text_domain' ),
					'filter_items_list'     => __( 'Filter Reservations list', 'text_domain' ),
				),
				'supports'              => array( 'title', 'editor' ),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 20,
				'menu_icon'             => 'dashicons-bed',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => false,
				'can_export'            => true,
				'has_archive'           => false,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'page',
			)
		);
	}

	/**
	 *  Add essential roles for the app to function correctly.
	 */
	public function createLRSGENRoles(){
		
		add_role(
			'lrsgenUser',
			'LRSGen User',
			array(
				'read'         => true,  // true allows this capability
				'edit_posts'   => true,
				'delete_posts' => false, // Use false to explicitly deny
				'level_7' 	   => true
			)
		);

		add_role(
			'lrsgenAdministrator',
			'LRSGen Administrator',
			array(
				'read'         => true,  // true allows this capability
				'edit_posts'   => true,
				'delete_posts' => true, // Use false to explicitly deny
				'level_10' 	   => true
			)
		);
	}

	/**
	 *  Add essential theme pages.
	 */
	public function createThemePages(){
		$pagesToCreate = [ 'hotels', 'reservations', 'rates', 'login', 'new reservation', 'edit reservation', 'confirmation', 'new hotel', 'edit hotel', 'edit rates' ];

		if(count($pagesToCreate) > 0){
			foreach( $pagesToCreate as $pageID ){
				$slug = sanitize_title_with_dashes($pageID);
				$pageExists = Lrsgen::the_slug_exists($slug);
				
				if(!$pageExists){
					$result = wp_insert_post(array(
						'post_type' => 'page',
						'post_title' => ucfirst($pageID),
						'post_content' => '',
						'post_status' => 'publish',
						'post_author' => 1,
						'post_slug' => $slug
					));
				}
			}
		}
	}
}
