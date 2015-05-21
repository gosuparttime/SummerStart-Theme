<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">
  <div id="main" class="span8 clearfix" role="main">
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
        <?php the_post_thumbnail( 'wpbs-featured' ); ?>
        <div class="page-header">
          <h1 class="zero-mar-b" itemprop="headline">
            <?php the_title(); ?>
          </h1>
          <p class="zero-mar-b"><em>Hometown: <? echo get_field('hometown'); ?></em></p>
          <h3><? echo 'Summer Start '. get_field('graduation_year'); ?></h3>
          <h5 class="zero-mar-t">Major: <? echo get_field('major'); ?> / <? echo get_field('college'); ?></h5>
        </div>
      </header>
      <!-- end article header -->
      
      <section class="post_content row-fluid" itemprop="articleBody">
        <?php
           echo '<div class="span4">';
			if (get_field('photo')){
				$attachment_id = get_field('photo');
				$size = "staff-large";
				$image = wp_get_attachment_image_src( $attachment_id, $size );
				echo '<div class="pad-one-b">';
				echo '<img class="above thumbnail" src="';
				echo $image[0];
				echo '" alt="';
				the_title();
				echo '" /></div>';
			};
			echo '</div>';
			echo '<div class="span8">';
			echo get_field('statement');
			echo '</div>';
		?>
      </section>
      <!-- end article section -->
      
      <footer class="mar-one-t">
        <a class="btn" href="../" title="Back to All Stories"><i class="pull-left icon-arrow-left"></i> Back to all stories</a>

      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
