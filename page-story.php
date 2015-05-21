<?php 
// Template Name: SummerStart Success Stories
//
get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">
                	<?php while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 itemprop="headline"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","summerstart") . ':</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
                    <? endwhile; ?>
					<?php 
					$c=1;
					$bpr=2;
					$query = new WP_Query(
						array( 
							'post_type' => 'story',
							'posts_per_page' => '-1',
							'orderby'=>'rand'
							)
						);
    				while ( $query->have_posts() ) : $query->the_post();
					if($c == 1) :
						echo '<div class="row-fluid mar-one-b" role="complementary">';
					endif; ?>
                    <div class="well well-blue span6">
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h2 itemprop="headline"><?php the_title(); ?></h2>
							<h5><? echo 'Summer Start '. get_field('graduation_year'); ?></h5>
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php
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
							echo '</em><span class="quotation right">&#8221;</span></p></div></div>';
							echo '<div class="clear">';
							echo '<a class="btn btn-small pull-right" href="'.get_permalink().'">';
							echo 'See Full Story <i class="icon-arrow-right"></i>';
							echo '</a></div>';
							?>
					
						</section> <!-- end article section -->
						
					</article> <!-- end article -->
                    </div>
					<?php if($c == $bpr) : ?>
                    </div>
                     <?php $c = 0;
                    endif; 
                    $c++;					
					endwhile; ?>		
					
					
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>