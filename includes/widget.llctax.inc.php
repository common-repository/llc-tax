<?php
/**
 * Widget (LLC Tax)
 *
**/

# Exit if accessed directly
if(!defined("LLC_EXEC")){
	die();
}


 /**
  * Add widget LLC Tax
  * 
  * @package LLC Tax
  * @author lightimagemedia
  * @version 1.1
  * @access public
  * 
  * Generate by Plugin Maker ~ http://codecanyon.net/item/wordpress-plugin-maker-freelancer-version/13581496
  */
class Llctax_Widget extends WP_Widget {

	/**
	 * Option Plugin
	 * @access private
	 **/
	private $options;

	/**
	* Register widget with WordPress.
	*/
	function __construct() {
		parent::__construct(
		"llctax", // Base ID
		__("LLC Tax","llc-tax"), // Name
		array("description" => __("", "llc-tax"),) // Args
		);
		$this->options = get_option("llc_tax_plugins"); // get current option
	}

	/**
	* Front-end display of widget.
	*
	* @see WP_Widget::widget()
	*
	* @param array $args     Widget arguments.
	* @param array $instance Saved values from database.
	*/
	public function widget( $args, $instance ){
		//TODO: WIDGET OPTION VARIABLE
		/**
		* @var string $instance["title"] - get widget title
		**/
		
		echo $args["before_widget"];
		if (!empty($instance["title"])){
			echo $args["before_title"]. apply_filters("widget_title", $instance["title"] ). $args["after_title"];
			echo __( '<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=windows-1252"/>
	<title></title>

	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
	</style>
	
</head>

<body>
<table cellspacing="0" border="0">
	<colgroup width="190"></colgroup>
	<colgroup width="1016"></colgroup>
	<tr>
		<td height="26" align="left">State</td>
		<td align="left">LLC TAX RATES</td>
	</tr>
	<tr>
		<td height="26" align="left">Alabama</td>
		<td align="left" sdnum="1033;0;@">6.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">Alaska</td>
		<td align="left">2 - 9.4%</td>
	</tr>
	<tr>
		<td height="26" align="left">Arizona</td>
		<td align="left" sdnum="1033;0;@">6.96%</td>
	</tr>
	<tr>
		<td height="26" align="left">Arkansas</td>
		<td align="left">1 - 6.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">California</td>
		<td align="left" sdnum="1033;0;@">8.84%</td>
	</tr>
	<tr>
		<td height="26" align="left">Colorado</td>
		<td align="left" sdnum="1033;0;@">4.63%</td>
	</tr>
	<tr>
		<td height="26" align="left">Connecticut</td>
		<td align="left">7.5% with $250 (minimum)</td>
	</tr>
	<tr>
		<td height="26" align="left">District of Columbia</td>
		<td align="left">9.975% with a minimum tax payment of $100 to submit $0 return.</td>
	</tr>
	<tr>
		<td height="26" align="left">Delaware</td>
		<td align="left">8.7%  lower rate for income 20 million+ down to 2.7%</td>
	</tr>
	<tr>
		<td height="26" align="left">Florida</td>
		<td align="left" sdnum="1033;0;@">5.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">Georgia</td>
		<td align="left" sdnum="1033;0;@">6%</td>
	</tr>
	<tr>
		<td height="26" align="left">Hawaii</td>
		<td align="left">4.4 to 6.4%</td>
	</tr>
	<tr>
		<td height="26" align="left">Idaho</td>
		<td align="left">7.6% with a minimum payment of $20 for a $0 return.</td>
	</tr>
	<tr>
		<td height="26" align="left">Illinois</td>
		<td align="left" sdnum="1033;0;@">7.3%</td>
	</tr>
	<tr>
		<td height="26" align="left">Indiana</td>
		<td align="left" sdnum="1033;0;@">8.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">Iowa</td>
		<td align="left">6 - 12%</td>
	</tr>
	<tr>
		<td height="26" align="left">Kansas</td>
		<td align="left">4 - 7.05%</td>
	</tr>
	<tr>
		<td height="26" align="left">Kentucky</td>
		<td align="left">4 - 6%</td>
	</tr>
	<tr>
		<td height="26" align="left">Louisiana</td>
		<td align="left">4 - 8%</td>
	</tr>
	<tr>
		<td height="26" align="left">Maine</td>
		<td align="left">3.5 to 9.93%</td>
	</tr>
	<tr>
		<td height="26" align="left">Maryland</td>
		<td align="left" sdnum="1033;0;@">8.25%</td>
	</tr>
	<tr>
		<td height="26" align="left">Massachusetts</td>
		<td align="left">9.5% with a minimum payment of $456</td>
	</tr>
	<tr>
		<td height="26" align="left">Michigan</td>
		<td align="left">4.95% plus .8% of sales</td>
	</tr>
	<tr>
		<td height="26" align="left">Minnesota</td>
		<td align="left" sdnum="1033;0;@">9.8%</td>
	</tr>
	<tr>
		<td height="26" align="left">Mississippi</td>
		<td align="left">3 - 5%</td>
	</tr>
	<tr>
		<td height="26" align="left">Missouri</td>
		<td align="left" sdnum="1033;0;@">6.25% </td>
	</tr>
	<tr>
		<td height="26" align="left">Montana</td>
		<td align="left">6.75% with a $50 minimum fee</td>
	</tr>
	<tr>
		<td height="26" align="left">Nebraska</td>
		<td align="left">5.58 - 7.81%</td>
	</tr>
	<tr>
		<td height="26" align="left">Nevada</td>
		<td align="left">No tax. $200 / Yearly business license tax</td>
	</tr>
	<tr>
		<td height="26" align="left">New Hampshire</td>
		<td align="left" sdnum="1033;0;@">8.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">New Jersey</td>
		<td align="left">6.5 - 9%</td>
	</tr>
	<tr>
		<td height="26" align="left">New Mexico</td>
		<td align="left">4.8 - 7.6%</td>
	</tr>
	<tr>
		<td height="26" align="left">New York</td>
		<td align="left">7.1% with a minimum tax of $100-$1500 </td>
	</tr>
	<tr>
		<td height="26" align="left">North Carolina</td>
		<td align="left">6.9% minimum tax payment of $35</td>
	</tr>
	<tr>
		<td height="26" align="left">North Dakota</td>
		<td align="left">4.1 to 6.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">Ohio</td>
		<td align="left">26% of your gross revenue. $150 minimum payment.</td>
	</tr>
	<tr>
		<td height="26" align="left">Oklahoma</td>
		<td align="left">6%. </td>
	</tr>
	<tr>
		<td height="26" align="left">Oregon</td>
		<td align="left">6.6 to 7.9%</td>
	</tr>
	<tr>
		<td height="26" align="left">Pennsylvania</td>
		<td align="left" sdnum="1033;0;@">9.99%</td>
	</tr>
	<tr>
		<td height="26" align="left">Rhode Island</td>
		<td align="left" sdnum="1033;0;@">9% </td>
	</tr>
	<tr>
		<td height="26" align="left">South Carolina</td>
		<td align="left" sdnum="1033;0;@">5%</td>
	</tr>
	<tr>
		<td height="26" align="left">South Dakota</td>
		<td align="left">None</td>
	</tr>
	<tr>
		<td height="26" align="left">Tennessee</td>
		<td align="left">subject to the Tennessee franchise tax and Tennessee Excise tax. Franchise tax has minimum payment of $100</td>
	</tr>
	<tr>
		<td height="26" align="left">Texas</td>
		<td align="left"> 1% on gross income over $1,000,000</td>
	</tr>
	<tr>
		<td height="26" align="left">Utah</td>
		<td align="left">5% with a minimum tax payment $100</td>
	</tr>
	<tr>
		<td height="26" align="left">Vermont</td>
		<td align="left">6 - 8.5%</td>
	</tr>
	<tr>
		<td height="26" align="left">Virginia</td>
		<td align="left" sdnum="1033;0;@">6%</td>
	</tr>
	<tr>
		<td height="26" align="left">Washington</td>
		<td align="left">ross income tax of 1.5% on your revenue after your first $35,000 of gross receipts</td>
	</tr>
	<tr>
		<td height="26" align="left">West Virginia</td>
		<td align="left">8.5% minimum payment of $50 for Business franchise tax.</td>
	</tr>
	<tr>
		<td height="26" align="left">Wisconsin</td>
		<td align="left" sdnum="1033;0;@">7.9%</td>
	</tr>
	<tr>
		<td height="26" align="left">Wyoming</td>
		<td align="left">No personal or corporate income tax. Sales tax 5.42%,</td>
	</tr>
</table>
<!-- ************************************************************************** -->
</body>

</html>', 'llc_widget_domain' );
		}
		//Display file path
		if(LLC_DEBUG==true){
			$file_info = null; 
			$file_info .= "<div>" ; 
			$file_info .= "<pre style=\"color:rgba(255,0,0,1);padding:3px;margin:0px;background:rgba(255,0,0,0.1);border:1px solid rgba(255,0,0,0.5);font-size:11px;font-family:monospace;white-space:pre-wrap;\">%s:%s</pre>" ; 
			$file_info .= "</div>" ; 
			printf($file_info,__FILE__,__LINE__);
		}
		echo $args["after_widget"];
	}

	/**
	* Back-end widget form.
	*
	* @see WP_Widget::form()
	*
	* @param array $instance Previously saved values from database.
	*/
	public function form( $instance ) {
		// Create Title
		$title = ! empty( $instance["title"] ) ? $instance["title"] : __("LLC Tax", "llc-tax");
		echo "<p>";
		echo '<label for="'. $this->get_field_id("title" ).'">'. __("Title:") .'</label>';
		echo '<input class="widefat" id="'.  $this->get_field_id("title") .'" name="'. $this->get_field_name("title").'" type="text" value="' . esc_attr( $title ) . '">';
		echo "</p>";
	}

	/**
	* Sanitize widget form values as they are saved.
	*
	* @see WP_Widget::update()
	*
	* @param array $new_instance Values just sent to be saved.
	* @param array $old_instance Previously saved values from database.
	*
	* @return array Updated safe values to be saved.
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance["title"] = ( ! empty( $new_instance["title"] ) ) ? strip_tags( $new_instance["title"] ) : "";
		
		return $instance;
	}
	
}  
