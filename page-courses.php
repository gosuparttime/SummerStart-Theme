<?php
// Template Name: Available Courses
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
      
      
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
    <h3>Course Offerings</h3>
    <?php
		echo '<ul class="inline inpage-nav">';
		$subjects = get_terms( 'subjects' );
		foreach ( $subjects as $subject ) {
			$query = new WP_Query( 
			$args = array(
				'posts_per_page' => '-1',
				'subjects' => $subject->slug,
				'post_type' => 'courses',
				'orderby'   => 'title',
				'order' => 'ASC',
			) );
			echo '<li><a href="#'.$subject->slug.'">';
			echo $subject->name;
			echo '</a></li>';
			
		}
		echo '</ul>';
		$subjects = get_terms( 'subjects' );
		foreach ( $subjects as $subject ) {
			$query = new WP_Query( 
			$args = array(
			'posts_per_page' => '-1',
			'subjects' => $subject->slug,
			'post_type' => 'courses',
			'orderby'   => 'title',
			'order' => 'ASC',
			//'orderby' => 'menu_order'
		) );
		echo '<a id="'.$subject->slug.'"></a>';
		echo '<hr />';
		echo '<h4 class="clearfix mar-one-t" id="'.$subject->name.'">';
		echo $subject->name;
		echo '</h4>';
		if ($subject->description):
			echo '<p>';
			echo $subject->description;
			echo '</p>';
		endif;
		echo '<div class="row-fluid clearfix" role="complementary">';
		echo '<table class="table table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">';
		echo '<caption>Course Details for '.$subject->name.' Courses</caption>';
		echo '<thead><tr>';
		echo '<th width="15%">Course</th>';
		echo '<th width="15%">Section</th>';
		echo '<th width="15%">Instructor</th>';
		echo '<th width="15%">Days</th>';
		echo '<th width="25%">Time</th>';
		echo '<th width="15%"># of Credits</th>';
		echo '</tr></thead>';
		echo '<tbody>';
		while ( $query->have_posts() ) : $query->the_post();
			while(has_sub_field('course_details')){
				echo '<tr>';
				echo '<td><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></td>';
				echo '<td>'.get_sub_field('course_section').'</td>';
				echo '<td>'.get_sub_field('course_instructor') .'</td>';
				$dates = get_sub_field('date_time');
				$date_entries = count($dates);
				echo '<td>';
				foreach($dates as $date){
					echo '<div class="row-fluid border-me">';
					echo implode('',$date['course_days']);
					echo '</div>';
				}
				echo '</td>';
				echo '<td>';
				foreach($dates as $date){
					echo '<div class="row-fluid border-me">'.$date['course_start_time'].'&#8211;'.$date['course_end_time'].'</div>';
				}
				echo '</td>';
				echo '<td>'.get_sub_field('course_credits').'</td>';
				echo '</tr>';
			}
		endwhile;
		echo '</tbody>';
		echo '</table>';
		wp_reset_postdata();
		$query = null;
		echo '</div>';
		wp_reset_postdata();
		}
		?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
