<?php
// Template Name: Staff Page
//
get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <h1 itemprop="headline">
          <?php the_title(); ?>
        </h1>
      </header>
      <!-- end article header -->
      
      <section class="post_content clearfix" itemprop="articleBody">
        <?php the_content(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","summerstart") . ':</span> ', ', ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    <hr />
    <?php endwhile; ?>
    <div class="row-fluid">
      <?php 
	$c = 1; //init counter
	$bpr = 2; //boxes per row
	$reset = 0;
	$staff_roles = get_terms( 'roles' );
	foreach ( $staff_roles as $staff_role ) {
    $query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
        'roles' => $staff_role->slug,
		'post_type' => 'staff',
		'order' => 'ASC',
    ) );
	$query = new WP_Query($args);
	echo '<h3 class="clearfix mar-one-t" id="'.$staff_role->slug.'">';
	echo $staff_role->name;
	echo '</h3>';
	if ($staff_role->description):
	echo '<p>';
	echo $staff_role->description;
	echo '</p>';
	endif;
	if($c == 1) :
		echo '<div class="row-fluid clearfix" role="complementary">';
	endif;
    while ( $query->have_posts() ) : $query->the_post();
	
	
		
		echo '<div class="span6 pad-one-b clearfix">';
		get_template_part('column', 'staff');
		echo '</div>';
		
	
    if($c == $bpr) :
		echo '</div>';
		echo '<div class="row-fluid clearfix" role="complementary">';
		$c = 0;
	endif;
	$c++;	
    endwhile;
	wp_reset_postdata();
    $query = null;
	
		echo '</div>';
		$c = 1;
	
    wp_reset_postdata();
	}
	?>
    </div>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
