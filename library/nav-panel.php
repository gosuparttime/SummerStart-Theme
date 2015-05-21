<?php
//

// Homepage Options Dashboard Menu
// –––––––––––––––––––––––––––––––––––––
$file_url = get_bloginfo('template_directory').'library/images/custom-post-icon.png';
function home_control_menu() {
  add_menu_page( 'Main Navigation', 'Main Navigation', 'edit_posts', 'nav-menu', null, '', 31 );
  add_submenu_page( 'nav-menu', 'Navigation Options', 'Navigation Options', 'edit_posts', 'acf-options-navigation-options', 'show_nav_options');
}
// Register Custom Post Type for Main Navigation
// –––––––––––––––––––––––––––––––––––––
add_action('admin_menu', 'home_control_menu');
function new_drawer_items() {

	$labels = array(
		'name'                => _x( 'Navigation Items', 'Post Type General Name', 'summerstart' ),
		'singular_name'       => _x( 'Navigation Item', 'Post Type Singular Name', 'summerstart' ),
		'menu_name'           => __( 'Navigation Itemsn', 'summerstart' ),
		'parent_item_colon'   => __( 'Parent Navigation Item:', 'summerstart' ),
		'all_items'           => __( 'All Navigation Items', 'summerstart' ),
		'view_item'           => __( 'View Navigation Item', 'summerstart' ),
		'add_new_item'        => __( 'Add New Navigation Item', 'summerstart' ),
		'add_new'             => __( 'New Navigation Item', 'summerstart' ),
		'edit_item'           => __( 'Edit Navigation Item', 'summerstart' ),
		'update_item'         => __( 'Update Navigation Item', 'summerstart' ),
		'search_items'        => __( 'Search Navigation Items', 'summerstart' ),
		'not_found'           => __( 'No Navigation Items Found', 'summerstart' ),
		'not_found_in_trash'  => __( 'No Navigation Item Found in Trash', 'summerstart' ),
	);
	$args = array(
		'label'               => __( 'drawer', 'summerstart' ),
		'description'         => __( 'Create menu items for main navigation on desktop', 'summerstart' ),
		'labels'              => $labels,
		'supports'            => array( 'title', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position' 	  => 1,
		'show_in_menu' 		  => 'nav-menu',
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => false,
		'capability_type'     => 'page',
	);
	register_post_type( 'drawer', $args );

}

// Hook into the 'init' action
add_action( 'init', 'new_drawer_items', 0 );
//
// Create Main Mega Drawer Options Page
// –––––––––––––––––––––––––––––––––––––
function show_nav_options(){
	echo '<h2>Hello</h2>';
}
if(function_exists("register_options_page"))
{
    register_options_page('Navigation Options');
}
// Create Main Mega Drawer Navigation
// –––––––––––––––––––––––––––––––––––––
function start_main_nav(){
	//var_dump( get_field('navigation_order', 'options') );
	echo '<ul class="row-fluid nav" id="main-navigation" role="navigation">';
    $main_nav = get_field('navigation_order', 'options');
    foreach( $main_nav as $post):
	
		$slug = $post->post_name;
	    echo '<li class="nav-link">';
	    echo '<a class="toggle" data-toggle="collapse" data-parent="#panels" href="#'.$slug.'">';
		echo $post->post_title;
		echo '<div class="caret"></div>';
		echo '</a>';
		echo '</li>';
	endforeach;
	echo '</ul><div class="row-fluid" id="panels">';
		foreach( $main_nav as $post):
	
		$item = $post;
		start_mega_drop($item);
		endforeach;
	echo '</div>';
}

function start_mega_drop($item){
	echo '<div id="'.$item->post_name.'" class="collapse info-panel">';
	echo '<div class="container nav-content">';
	echo '<img src="';
	echo bloginfo( 'stylesheet_directory' );
	echo '/library/images/top-glow.jpg" alt="top glow" />';
	echo '<div class="row-fluid" id="nav-'.$item->ID.'">';
	echo '<div class="span4">';
	$args = array(
		'post_type' => 'drawer',
		'page_id' => $item->ID,
	);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) : $query->the_post();
	$myLinks = get_field('nav_links');
 
if( $myLinks ): ?>

<ul class="unstyled drawer-nav">
  <?php foreach( $myLinks as $link_object): ?>
  <li> <a href="<?php echo get_permalink($link_object->ID); ?>"><?php echo get_the_title($link_object->ID); ?></a> </li>
  <?php endforeach; ?>
</ul>
<?php endif;
	endwhile;
	echo '</div>';
	echo '</div>';
	echo '<img src="';
	echo bloginfo( 'stylesheet_directory' );
	echo '/library/images/bottom-glow.jpg" alt="bottom glow" />';
	echo '</div></div>';
}
function student_nav_pop($slug){
	echo '<div class="row-fluid">';
	echo '<div class="row-fluid orange-text"><h3 class="block">';
	if (get_field('intro_title')){
		echo get_field('intro_title');
	} else {
		echo the_title();
	}
	echo '</h3></div>';
	echo '<div class="one-third"><div class="copy-block list-links">';
	echo the_field('intro_copy');
	echo '</div></div>';
	echo '<div class="two-thirds">';
	if (get_field('remove_links')){
		$newspan = "one-half";
	} else {
		$newspan = "one-third";
		echo '<div class="'.$newspan.'" id="'.$slug.'-intro"><div class="list-links">';
		echo the_field('intro_links');
		echo '</div></div>';
	}
	echo '<div class="'.$newspan.'" id="'.$slug.'-programs"><div class="list-links">';
	echo '<h4>'.get_field('program_title').'</h4>';
	echo get_field('program_links');
	echo '</div></div>';
	echo '<div class="'.$newspan.'" id="'.$slug.'-resources"><div class="list-links">';
	echo '<h4>'.get_field('resource_title').'</h4>';
	echo get_field('resource_links');
	echo '</div></div>';
	echo '</div></div>';
}
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */ 

// Fields 
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	//include_once('add-ons/acf-repeater/repeater.php');
	//include_once('add-ons/acf-gallery/gallery.php');
	//include_once('add-ons/acf-flexible-content/flexible-content.php');
}

// Options Page 
//include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_navigation-order',
		'title' => 'Navigation Order',
		'fields' => array (
			array (
				'key' => 'field_51e044863b96b',
				'label' => 'About Navigation Order',
				'name' => '',
				'type' => 'message',
				'message' => '<h1>About Navigation Order</h1>
	This is meant to be able to order the main level navigation to be in concert with the mobile navigation. Any new navigation items will also need to be addressed in Dashboard >	Appearance > Menus',
			),
			array (
				'key' => 'field_51e042a94326f',
				'label' => 'Navigation Order',
				'name' => 'navigation_order',
				'type' => 'relationship',
				'instructions' => 'Click and drag the desired page order for the main navigation to be seen on desktop and tablet versions',
				'required' => 1,
				'post_type' => array (
					0 => 'drawer',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-navigation-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>
