<?php 
//Template Name: Frequently Asked Questions
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
    
    <?php endwhile; ?>
    <article id="faqs">
      <?php 
       $faqs = get_terms('faq-sections');
		foreach ( $faqs as $faq ) {
		$args = array(
			'post_type' => 'faq',
			'faq-sections' => $faq->slug,
			'orderby' => 'title', 
			'order' => 'asc',
			'posts_per_page' => '-1'
		);
		$loop = new WP_Query( $args );
		echo '<h5 class="clearfix" id="'.$faq->slug.'">';
		echo $faq->name;
		echo '</h5>';
    ?>
      <nav id="<? echo $faq->slug?>-menu" class="faq-nav" role="navigation">
        <ul>
          <?php while ($loop-> have_posts()) : $loop-> the_post(); ?>
          <li><a title="<?php the_title(); ?>" href="#faq-<?php the_ID(); ?>">
            <?php the_title(); ?>
            </a></li>
          <?php endwhile;
		  wp_reset_postdata();
		  $query = null; ?>
        </ul>
      </nav>
      <? } ?>
      <?php 
       $faqs = get_terms('faq-sections');
	
	foreach ( $faqs as $faq ) {
		$args = array(
			'post_type' => 'faq',
			'faq-sections' => $faq->slug,
			'orderby' => 'title', 
			'order' => 'asc',
			'posts_per_page' => '-1'
		);
		$loop = new WP_Query( $args );
	  echo '<hr />';
	  echo '<h3 class="clearfix" id="'.$faq->slug.'">';
	  echo $faq->name;
	  echo '</h3>';
	  while ($loop-> have_posts()) : $loop-> the_post(); ?>
      <article id="faq-<?php the_ID(); ?>" class="clearfix">
        <header>
          <h4>
            <?php the_title(); ?>
          </h4>
        </header>
        <section>
          <?php the_content(); ?>
        </section>
      </article>
      <a class="btn btn-small" href="#<? echo $faq->slug?>">Back to <? echo $faq->name?> FAQ Navigation <i class="icon-arrow-up"></i></a>
      <?php endwhile;
	  wp_reset_postdata();
		$query = null;
	} ?>
    </article>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
