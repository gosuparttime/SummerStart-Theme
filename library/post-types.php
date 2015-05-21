<?php



// Homepage Options Dashboard Menu
//$file_url = get_bloginfo('template_directory').'/library/images/custom-post-icon.png';
function home_page_menu() {
  add_menu_page( 'Site Options', 'Site Options', 'edit_posts', 'home-menu', null, '', 32 );
}

add_action('admin_menu', 'home_page_menu');

// Custom Post Types
add_action( 'init', 'create_new_slides' );
function create_new_slides() {
	// Add Student Types
	$labels = array(
		'name' => 'Slides',
		 'singular_name' => 'Slide',
		 'menu_name' => 'Slides',
		 'add_new' => 'Add Slide',
		 'add_new_item' => 'Add New Slide',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Slide',
		 'new_item' => 'New Slide',
		 'view' => 'View Slide',
		 'view_item' => 'View Slide',
		 'search_items' => 'Search Slides',
		 'not_found' => 'No Slides Found',
		 'not_found_in_trash' => 'No Slides Found in Trash',
		 'parent' => 'Parent Slide'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new slides for SummerStart. These are displayed on the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'slide'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 1,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('slide', $args);
};
function set_slide_columns($columns) {
    return array(
        'cb' => '<input type="checkbox" />',
        'title' => __('Title'),
        'date' => __('Date'),
        'author' => __('Author'),
		'column_1' => __('Slide Image'),
        'column_2' => __('Slide URL'),
    );
}
// POPULATE CUSTOM COLUMNS ON CUSTOM POST
add_action('manage_slide_posts_custom_column', 'add_new_slide_cols', 10, 2);
	function add_new_slide_cols($column, $post_id){
	global $post;
	switch ($column){
	case 'column_1':
	$column_1_content = the_field('slide_image');
	echo $column_1_content;
	case 'column_2':
	$column_2_content = the_field('slide_url');
	echo $column_2_content;
	default:
	break;
	}
}
add_filter('manage_slide_posts_columns' , 'set_slide_columns');
// New Modules For Site
add_action( 'init', 'create_new_modules' );
function create_new_modules() {
	// Add Modules
	$labels = array(
		'name' => 'Modules',
		 'singular_name' => 'Module',
		 'menu_name' => 'Modules',
		 'add_new' => 'Add Module',
		 'add_new_item' => 'Add New Module',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Module',
		 'new_item' => 'New Module',
		 'view' => 'View Module',
		 'view_item' => 'View Module',
		 'search_items' => 'Search Modules',
		 'not_found' => 'No Modules Found',
		 'not_found_in_trash' => 'No Modules Found in Trash',
		 'parent' => 'Parent Module'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new modules for SummerStart. These can be content blocks for the homepage',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'module'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 2,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor', 'thumbnail'),
	);
	register_post_type('module', $args);
};
// New Stories For Site
add_action( 'init', 'create_new_story' );
function create_new_story() {
	// Add Modules
	$labels = array(
		'name' => 'Student Stories',
		 'singular_name' => 'Student Story',
		 'menu_name' => 'Student Stories',
		 'add_new' => 'Add Student Story',
		 'add_new_item' => 'Add New Student Story',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Student Story',
		 'new_item' => 'New Student Story',
		 'view' => 'View Student Story',
		 'view_item' => 'View Student Story',
		 'search_items' => 'Search Student Stories',
		 'not_found' => 'No Student Stories Found',
		 'not_found_in_trash' => 'No Student Stories Found in Trash',
		 'parent' => 'Parent Student Story'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new student stories for SummerStart.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => '/why-choose-summer-start/summerstart-stories'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 33,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('story', $args);
};
// New Did You Knows For Site
add_action( 'init', 'create_new_facts' );
function create_new_facts() {
	// Add Modules
	$labels = array(
		'name' => 'Did You Know',
		 'singular_name' => 'Did You Know Feature',
		 'menu_name' => 'Did You Know Features',
		 'add_new' => 'Add Did You Know Feature',
		 'add_new_item' => 'Add New Did You Know Feature',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Did You Know Feature',
		 'new_item' => 'New Did You Know Feature',
		 'view' => 'View Did You Know Feature',
		 'view_item' => 'View Did You Know Feature',
		 'search_items' => 'Search Did You Know Features',
		 'not_found' => 'No Did You Know Features Found',
		 'not_found_in_trash' => 'No Did You Know Features Found in Trash',
		 'parent' => 'Parent Did You Know Feature'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new student "Did You Know" feature items for SummerStart.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'did-you-know'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 3,
		'show_in_menu' => 'home-menu',
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('facts', $args);
};
// FAQs
add_action( 'init', 'create_new_faq' );
function create_new_faq() {
	// Add Student Types
	$labels = array(
		'name' => 'FAQs',
		 'singular_name' => 'FAQ',
		 'menu_name' => 'FAQs',
		 'add_new' => 'Add FAQ',
		 'add_new_item' => 'Add New FAQ',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit FAQ',
		 'new_item' => 'New FAQ',
		 'view' => 'View FAQ',
		 'view_item' => 'View FAQ',
		 'search_items' => 'Search FAQs',
		 'not_found' => 'No FAQs Found',
		 'not_found_in_trash' => 'No FAQs Found in Trash',
		 'parent' => 'Parent FAQ'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new FAQ items for SummerStart.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'faq'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 34,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('faq', $args);
};
// Register Custom Taxonomy
function faq_directory()  {
	$labels = array(
		'name'                       => _x( 'FAQ Sections', 'Taxonomy General Name', 'summerstart' ),
		'singular_name'              => _x( 'FAQ Section', 'Taxonomy Singular Name', 'summerstart' ),
		'menu_name'                  => __( 'FAQ Sections', 'summerstart' ),
		'all_items'                  => __( 'All FAQ Sections', 'summerstart' ),
		'parent_item'                => __( 'Parent FAQ Section', 'summerstart' ),
		'parent_item_colon'          => __( 'Parent FAQ Section:', 'summerstart' ),
		'new_item_name'              => __( 'New FAQ Section Name', 'summerstart' ),
		'add_new_item'               => __( 'Add New FAQ Section', 'summerstart' ),
		'edit_item'                  => __( 'Edit FAQ Section', 'summerstart' ),
		'update_item'                => __( 'Update FAQ Section', 'summerstart' ),
		'separate_items_with_commas' => __( 'Separate FAQ Sections with commas', 'summerstart' ),
		'search_items'               => __( 'Search FAQ Sections', 'summerstart' ),
		'add_or_remove_items'        => __( 'Add or remove FAQ Section', 'summerstart' ),
		'choose_from_most_used'      => __( 'Choose from the most used FAQ Section', 'summerstart' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'faq-sections', 'faq', $args );
}

// Hook into the 'init' action
add_action( 'init', 'faq_directory', 0 );

// FAQs
add_action( 'init', 'create_new_courses' );
function create_new_courses() {
	// Add Student Types
	$labels = array(
		'name' => 'Courses',
		 'singular_name' => 'Course',
		 'menu_name' => 'Courses',
		 'add_new' => 'Add Course',
		 'add_new_item' => 'Add New Course',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Course',
		 'new_item' => 'New Course',
		 'view' => 'View Course',
		 'view_item' => 'View Course',
		 'search_items' => 'Search Courses',
		 'not_found' => 'No Courses Found',
		 'not_found_in_trash' => 'No Courses Found in Trash',
		 'parent' => 'Parent Course'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Courses listings for SummerStart.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		//'rewrite' => array('slug' => 'courses'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 35,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title', 'editor'),
	);
	register_post_type('courses', $args);
};
// Register Custom Taxonomy
function course_subjects()  {
	$labels = array(
		'name'                       => _x( 'Subject Sections', 'Taxonomy General Name', 'summerstart' ),
		'singular_name'              => _x( 'Subject Section', 'Taxonomy Singular Name', 'summerstart' ),
		'menu_name'                  => __( 'Subject Sections', 'summerstart' ),
		'all_items'                  => __( 'All Subject Sections', 'summerstart' ),
		'parent_item'                => __( 'Parent Subject Section', 'summerstart' ),
		'parent_item_colon'          => __( 'Parent Subject Section:', 'summerstart' ),
		'new_item_name'              => __( 'New Subject Section Name', 'summerstart' ),
		'add_new_item'               => __( 'Add New Subject Section', 'summerstart' ),
		'edit_item'                  => __( 'Edit Subject Section', 'summerstart' ),
		'update_item'                => __( 'Update Subject Section', 'summerstart' ),
		'separate_items_with_commas' => __( 'Separate Subject Sections with commas', 'summerstart' ),
		'search_items'               => __( 'Search Subject Sections', 'summerstart' ),
		'add_or_remove_items'        => __( 'Add or remove Subject Section', 'summerstart' ),
		'choose_from_most_used'      => __( 'Choose from the most used Subject Section', 'summerstart' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'subjects', 'courses', $args );
}

// Hook into the 'init' action
add_action( 'init', 'course_subjects', 0 );

//
add_action( 'init', 'create_new_staff' );
function create_new_staff() {
	// Add Student Types
	$labels = array(
		'name' => 'Staff',
		 'singular_name' => 'Staff',
		 'menu_name' => 'Staff',
		 'add_new' => 'Add Staff',
		 'add_new_item' => 'Add New Staff Member',
		 'edit' => 'Edit',
		 'edit_item' => 'Edit Staff Member',
		 'new_item' => 'New Staff Member',
		 'view' => 'View Staff Member',
		 'view_item' => 'View Staff Member',
		 'search_items' => 'Search Staff Members',
		 'not_found' => 'No Staff Members Found',
		 'not_found_in_trash' => 'No Staff Members Found in Trash',
		 'parent' => 'Parent Staff'
	);
	$args = array(
		'labels' => $labels,
		'description' => 'Create new Staff Members for SummerStart.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'about-us/staff'),
		'query_var' => true,
		'exclude_from_search' => true,
		'menu_position' => 35,
		'menu_icon' => get_bloginfo('template_directory') . '/library/images/custom-post-icon.png',  // Icon Path
		'supports' => array('title'),
	);
	register_post_type('staff', $args);
};

//Media Gallery Custom Tax
// Register Custom Taxonomy
function media_directory()  {
	$labels = array(
		'name'                       => _x( 'Media Types', 'Taxonomy General Name', 'summerstart' ),
		'singular_name'              => _x( 'Media Type', 'Taxonomy Singular Name', 'summerstart' ),
		'menu_name'                  => __( 'Media Types', 'summerstart' ),
		'all_items'                  => __( 'All Media Types', 'summerstart' ),
		'parent_item'                => __( 'Parent Media Type', 'summerstart' ),
		'parent_item_colon'          => __( 'Parent Media Type:', 'summerstart' ),
		'new_item_name'              => __( 'New Media Type Name', 'summerstart' ),
		'add_new_item'               => __( 'Add New Media Type', 'summerstart' ),
		'edit_item'                  => __( 'Edit Media Type', 'summerstart' ),
		'update_item'                => __( 'Update Media Type', 'summerstart' ),
		'separate_items_with_commas' => __( 'Separate media types with commas', 'summerstart' ),
		'search_items'               => __( 'Search Media Types', 'summerstart' ),
		'add_or_remove_items'        => __( 'Add or remove media types', 'summerstart' ),
		'choose_from_most_used'      => __( 'Choose from the most used media types', 'summerstart' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	register_taxonomy( 'types', 'attachment', $args );
}

// Hook into the 'init' action
add_action( 'init', 'media_directory', 0 );

// Register Custom Taxonomy
function create_staff_roles()  {

	$labels = array(
		'name'                       => _x( 'Staff Roles', 'Taxonomy General Name', 'summerstart' ),
		'singular_name'              => _x( 'Staff Role', 'Taxonomy Singular Name', 'summerstart' ),
		'menu_name'                  => __( 'Staff Roles', 'summerstart' ),
		'all_items'                  => __( 'All Staff Roles', 'summerstart' ),
		'parent_item'                => __( 'Parent Staff Role', 'summerstart' ),
		'parent_item_colon'          => __( 'Parent Staff Role:', 'summerstart' ),
		'new_item_name'              => __( 'New Staff Role', 'summerstart' ),
		'add_new_item'               => __( 'Add New Staff Role', 'summerstart' ),
		'edit_item'                  => __( 'Edit Staff Role', 'summerstart' ),
		'update_item'                => __( 'Update Staff Role', 'summerstart' ),
		'separate_items_with_commas' => __( 'Separate staff roles with commas', 'summerstart' ),
		'search_items'               => __( 'Search Staff Roles', 'summerstart' ),
		'add_or_remove_items'        => __( 'Add or Remove Staff Role', 'summerstart' ),
		'choose_from_most_used'      => __( 'Choose from the most used staff roles', 'summerstart' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'roles', 'staff', $args );
}
// Hook into the 'init' action
add_action( 'init', 'create_staff_roles', 0 );
?>