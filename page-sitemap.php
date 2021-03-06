<?php
// Template Name: Sitemap
//
get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
							
							<h1 itemprop="headline"><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
                        	<?php if(has_post_thumbnail()){
								echo '<div class="pad-one-b">';
								the_post_thumbnail('featured-image');
								echo '</div>';
							}
							the_content(); ?>
                            
					
						</section> <!-- end article section -->
						
						<footer>
			
							<?php wp_nav_menu( 
								array( 
									'menu' => 'sitemap', /* menu name */
									'menu_class' => 'nav',
									'theme_location' => 'main_nav', /* where in the theme it's assigned */
									'container' => 'false', /* container class */
									'depth' => '3', /* suppress lower levels for now */
								)
							); ?> 
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
										
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "summerstart"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "summerstart"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>