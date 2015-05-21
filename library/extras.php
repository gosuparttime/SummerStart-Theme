<?php
//
// Display Components
function display_module($type, $heading, $block, $hide) {
	echo '<div class="clearfix';
	
	echo '" role="complementary">';
    $query = new WP_Query(array( 'post_type' => 'module', 'name' => $type));
    while ( $query->have_posts() ) : $query->the_post();
	if (!$hide){
		echo '<h'.$heading.'>';
		the_title();
		echo '</h'.$heading.'>';
	}
	if (has_post_thumbnail()){
		echo '<div class="pad-one-t">'; 
		the_post_thumbnail('featured');
		echo '</div>'; 
	}
	the_content();//$info; 
    endwhile;
	wp_reset_postdata();
	echo '</div>'; 
}


// Module Widget
class ModuleWidget extends WP_Widget
{
  function ModuleWidget()
  {
    $widget_ops = array('classname' => 'ModuleWidget', 'description' => 'Displays information from selected module section within "Homepage Options"' );
    $this->WP_Widget('ModuleWidget', 'Module Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'available' => '', 'checkbox' => '', ) );
	$available = $instance['available'];
	$checkbox = $instance['checkbox'];
	$query = new WP_Query(array( 'post_type' => 'module', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Module: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
  <p><input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
        <label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Remove Title'); ?></label>
  </p>

</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['checkbox'] = $new_instance['checkbox'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$checkbox = empty($instance['checkbox']) ? ' ' : apply_filters('widget_title', $instance['checkbox']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'module', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	
	if ($checkbox !="1"){
		echo $before_title;
		echo the_title();
		echo $after_title;
	}
	
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="row-fluid">';
	
	echo the_content();
	
	echo '</div>';
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ModuleWidget");') );

// Student Story Widget
class StoryWidget extends WP_Widget
{
  function StoryWidget()
  {
    $widget_ops = array('classname' => 'StoryWidget', 'description' => 'Displays information from a random student story' );
    $this->WP_Widget('StoryWidget', 'Student Story Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	//$available = $instance['available'];
	$title = $instance['title'];
	//$query = new WP_Query(array( 'post_type' => 'story', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">Student Story Label: </label>
  <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" style="width:100%;" type="text" value="SummerStart Success"/>
</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	//$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	//$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'story', 'posts_per_page' => '1', 'orderby'=>'rand'));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	echo $before_title;
	echo $title; //the_title();
	echo $after_title;
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="row-fluid">';
	echo '<div class="span5 mobile2">';
	if (get_field('photo')){
		$attachment_id = get_field('photo');
		$size = "staff-small";
		$image = wp_get_attachment_image_src( $attachment_id, $size );
		echo '<div class="pad-one-b">';
		echo '<img class="above thumbnail" src="';
		echo $image[0];
		echo '" alt="';
		the_title();
		echo '" /></div>';
	};
	echo '</div>';
	echo '<div class="span7 mobile2">';
	echo '<div class="factoid"><p><span class="quotation left">&#8220;</span><em>';
	if (get_field('quotation')){
		echo get_field('quotation');
	} else {
		$content = get_field('statement');
		$trimmed_content = wp_trim_words( $content, 40, '' );
		echo $trimmed_content;
	};
	echo '</em><span class="quotation right">&#8221;</span></p></div>';
	echo '<p class="zero-mar-b"><strong>';
	echo get_the_title();
	echo '</strong><br />';
	echo 'Summer Start '. get_field('graduation_year');
	echo '</p>';
	echo '</div>';
	echo '<a class="btn btn-small" href="/why-choose-summer-start/summerstart-stories/">See More SummerStart Success Stories <i class="icon-arrow-right"></i></a>';
	echo '</div>';
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("StoryWidget");') );

//
// Did You Know Widget
class FactWidget extends WP_Widget
{
  function FactWidget()
  {
    $widget_ops = array('classname' => 'FactWidget', 'description' => 'Displays information from a random Did You Know featurette' );
    $this->WP_Widget('FactWidget', 'Did You Know Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
	//$available = $instance['available'];
	$title = $instance['title'];
	//$query = new WP_Query(array( 'post_type' => 'story', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('title'); ?>">Did You Know Label: </label>
  <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" class="widefat" style="width:100%;" type="text" value="Did You Know"/>
</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	//$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	//$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'facts', 'posts_per_page' => '1', 'orderby'=>'rand'));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	echo $before_title;
	echo $title; //the_title();
	echo $after_title;
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="row-fluid">';
	echo '<div class="pad-one-b">';
	if (get_field('image')){
		$attachment_id = get_field('image');
		$size = "module-image";
		$image = wp_get_attachment_image_src( $attachment_id, $size );
		echo '<img class="above thumbnail" src="';
		echo $image[0];
		echo '" alt="';
		the_title();
		echo '" />';
	};
	echo '</div>';
	echo '<div class="row-fluid">';
	echo '<div class="factoid"><em>';
	if (get_field('factoid')){
		echo get_field('factoid');
	} 
	echo '</em></div>';
	echo '</div></div>';
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("FactWidget");') );

?>