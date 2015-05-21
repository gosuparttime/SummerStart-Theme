<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							
							
							<div class="page-header"><h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1></div>
							
										
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
						<?php 
							if (has_post_thumbnail){
								the_post_thumbnail( 'featured-image' );
							}?>
							<?php the_content(); ?>
							
					
						</section> <!-- end article section -->
						
						<footer>
			
							<h4>Course Offerings</h4>
                            <?php
                            $rows = get_field('course_details');
							if($rows)
							{
								echo '<table class="table table-hover" cellpadding="0" cellspacing="0" border="0" width="100%">';
								echo '<caption>Course Details for '.get_the_title().'</caption>';
								echo '<thead><tr>';
								echo '<th width="15%">Section</th>';
								echo '<th width="20%">Instructor</th>';
								echo '<th width="20%">Days</th>';
								echo '<th width="30%">Time</th>';
								echo '<th width="15%"># of Credits</th>';
								echo '</tr></thead>';
								echo '<tbody>';
							 
								while(has_sub_field('course_details')){
									echo '<tr>';
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
							 	echo '</tbody>';
								echo '</table>';
								
							}
						?>						
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					
					<?php endwhile; ?>			
					
					
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>