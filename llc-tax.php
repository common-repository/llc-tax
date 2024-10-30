<?php

/**

Plugin Name: LLC Tax 
Plugin URI: https://howtocreateapressrelease.com
Description: Displays an llc form search by state in your WordPress sidebar or any widget area of your wordpress blog.
Version: 1.1 
Author: How To Create A Press Release
Author URI: https://howtocreateapressrelease.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displays llc tax rates by state in your WordPress sidebar or any widget area of your wordpress blog.

**/

# Exit if accessed directly
if (!defined("ABSPATH"))
{
	exit;
}

# Constant

/**
 * Exec Mode
 **/
define("LLC_EXEC",true);

/**
 * Plugin Base File
 **/
define("LLC_PATH",dirname(__FILE__));

/**
 * Plugin Base Directory
 **/
define("LLC_DIR",basename(LLC_PATH));

/**
 * Plugin Base URL
 **/
define("LLC_URL",plugins_url("/",__FILE__));

/**
 * Plugin Version
 **/
define("LLC_VERSION","1.1"); 

/**
 * Debug Mode
 **/
define("LLC_DEBUG",false);  //change false for distribution



/**
 * Base Class Plugin
 * @author lightimagemedia
 *
 * @access public
 * @version 1.1
 * @package LLC Tax
 *
 **/

class LlcTax
{

	/**
	 * Instance of a class
	 * @access public
	 * @return void
	 **/

	function __construct()
	{
		add_action("plugins_loaded", array($this, "llc_textdomain")); //load language/textdomain
		add_action("wp_enqueue_scripts",array($this,"llc_enqueue_scripts")); //add js
		add_action("wp_enqueue_scripts",array($this,"llc_enqueue_styles")); //add css
		add_action("widgets_init", array($this, "llc_widget_llctax_init")); //init widget
		add_action("after_setup_theme", array($this, "llc_image_size")); // register image size.
		add_filter("image_size_names_choose", array($this, "llc_image_sizes_choose")); // image size choose.
		add_action("init", array($this, "llc_register_taxonomy")); // register register_taxonomy.
		add_action("wp_head",array($this,"llc_dinamic_js"),1); //load dinamic js
		if(is_admin()){
			add_action("admin_enqueue_scripts",array($this,"llc_admin_enqueue_scripts")); //add js for admin
			add_action("admin_enqueue_scripts",array($this,"llc_admin_enqueue_styles")); //add css for admin
			add_action("admin_menu", array($this, "llc_admin_menu_llctax_adminmenuarea")); //create page admin
		}
	}


	/**
	 * Loads the plugin's translated strings
	 * @link http://codex.wordpress.org/Function_Reference/load_plugin_textdomain
	 * @access public
	 * @return void
	 **/
	public function llc_textdomain()
	{
		load_plugin_textdomain("llc-tax", false, LLC_DIR . "/languages");
	}


	/**
	 * Insert javascripts for back-end
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 * @param object $hooks
	 * @access public
	 * @return void
	 **/
	public function llc_admin_enqueue_scripts($hooks)
	{
		if (function_exists("get_current_screen")) {
			$screen = get_current_screen();
		}else{
			$screen = $hooks;
		}
			wp_enqueue_script("llc_admin_widget", LLC_URL . "assets/js/llc_admin_widget.js", array("jquery"),"1.1",true );
	}


	/**
	 * Insert javascripts for front-end
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	 * @param object $hooks
	 * @access public
	 * @return void
	 **/
	public function llc_enqueue_scripts($hooks)
	{
			wp_enqueue_script("llc_main", LLC_URL . "assets/js/llc_main.js", array("jquery"),"1.1",true );
	}


	/**
	 * Insert CSS for back-end
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/wp_register_style
	 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_style
	 * @param object $hooks
	 * @access public
	 * @return void
	 **/
	public function llc_admin_enqueue_styles($hooks)
	{
		if (function_exists("get_current_screen")) {
			$screen = get_current_screen();
		}else{
			$screen = $hooks;
		}
	}


	/**
	 * Insert CSS for front-end
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/wp_register_style
	 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_style
	 * @param object $hooks
	 * @access public
	 * @return void
	 **/
	public function llc_enqueue_styles($hooks)
	{
		// register css
		wp_register_style("llc_main", LLC_URL . "assets/css/llc_main.css",array(),"1.1" );
			wp_enqueue_style("llc_main");
	}


	/**
	 * Register new widget (llctax)
	 *
	 * @access public
	 * @return void
	 **/
	public function llc_widget_llctax_init()
	{
		if(file_exists(LLC_PATH . "/includes/widget.llctax.inc.php")){
			require_once(LLC_PATH . "/includes/widget.llctax.inc.php");
			register_widget("Llctax_Widget");
		}
	}


	/**
	 * Add top level admin menu
	 * 
	 * @access public
	 * @return void
	 **/
	public function llc_admin_menu_llctax_adminmenuarea()
	{
		add_menu_page(
			__("LLC Tax","llc-tax"), //page title
			__("LLC Tax","llc-tax"), //anchor link
			"read",
			"llctax_adminmenuarea",
			array($this,"llc_admin_menu_llctax_adminmenuarea_markup"),
			"dashicons-media-text",
			45
		);
	}


	/**
	 * Create markup for top level admin menu
	 * 
	 * @access public
	 * @return void
	 **/
	public function llc_admin_menu_llctax_adminmenuarea_markup()
	{
		if(file_exists(LLC_PATH . "/includes/admin_menu.llctax_adminmenuarea.inc.php")){
			require_once(LLC_PATH . "/includes/admin_menu.llctax_adminmenuarea.inc.php");
			$llctax_adminmenuarea_admin_menu = new LlctaxAdminmenuarea_adminMenu($this);
			$llctax_adminmenuarea_admin_menu->Markup();
		}
	}


	/**
	 * Register a new image size.
	 * @link http://codex.wordpress.org/Function_Reference/add_image_size
	 * @access public
	 * @return void
	 **/
	public function llc_image_size()
	{
	}


	/**
	 * Choose a image size.
	 * @access public
	 * @param mixed $sizes
	 * @return void
	 **/
	public function llc_image_sizes_choose($sizes)
	{
		$custom_sizes = array(
		);
		return array_merge($sizes,$custom_sizes);
	}


	/**
	 * Register Taxonomies
	 * @https://codex.wordpress.org/Taxonomies
	 * @access public
	 * @return void
	 **/
	public function llc_register_taxonomy()
	{
	}


	/**
	 * Insert Dynamic JS
	 * @param object $hooks
	 * @access public
	 * @return void
	 **/
	public function llc_dinamic_js($hooks)
	{
		_e("<script type=\"text/javascript\">");
		_e("</script>");
	}
}


new LlcTax();
