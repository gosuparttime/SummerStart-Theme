<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!--<link href='http://fonts.googleapis.com/css?family=Bitter:400,700' rel='stylesheet' type='text/css'>-->
<script type="text/javascript" src="//use.typekit.net/eqx1qju.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<!-- wordpress head functions -->
<?php wp_head(); ?>

<!-- end of wordpress head -->
<!-- media-queries.js (fallback) -->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/dumbo.css">
  
<![endif]>
<!--[if lt IE 8]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/font-awesome-ie7.min.css">
<![endif]-->
<!-- typeahead plugin - if top nav search bar enabled -->
<?php require_once('library/typeahead.php'); ?>
</head>

<body <?php body_class(); ?>>
<header role="banner" id="top">
  <div id="sunburst">
    <div class="mobile-search visible-phone hidden-print" id="utility">
      <div class="utility-collapse collapse">
        <form class="utility-search" role="search" method="get" id="searchform-nav" action="<?php echo home_url( '/' ); ?>">
          <input type="text" class="input-large" autocomplete="off" placeholder="<?php _e('Search','summerstart'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
        </form>
      </div>
      <a class="btn-search pull-right hidden-phone" data-toggle="collapse" data-target=".utility-collapse">Search <i class="icon-search"></i></a> </div>
    <div id="inner-header" class="clearfix container">
      <div class="row-fluid">
        <div class="span5" id="branding">
          <h1><a class="brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/summerStart_logo.png" alt="<?php bloginfo( 'name' ); ?>" /> <span class="hidden">
            <?php bloginfo('name'); ?>
            </span></a></h1>
        </div>
        <div class="span7 hidden-phone">
          <div class="row-fluid" id="utility_links">
            <?php summer_utility_links(); // Adjust using Menus in Wordpress Admin ?>
          </div>
          <div class="row-fluid">
            <form class="navbar-search pull-right" role="search" method="get" id="searchform-head" action="<?php echo home_url( '/' ); ?>">
              <div class="input-append">
                <input name="s" id="s" type="text" class="" autocomplete="off" placeholder="<?php _e('Search','summerstart'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
                <span class="add-on"><i class="icon-search"></i></span></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end #inner-header --> 
  </div>
</header>
<!-- end header -->
<div id="rollinghills" class="clearfix">
<div class="container" id="wrapper">
<div id="banner-image" class="hero-unit container">
  <?php if (is_front_page()){ ?>
  <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators hidden-phone">
      <?php 
			$post_num = 0;
            $query = new WP_Query(array( 'post_type' => 'slide'));
			while ( $query->have_posts() ) : $query->the_post();
			
			echo  '<li data-target="#myCarousel" data-slide-to="'.$post_num.'" ';
			 
			if($post_num == 0){ 
				echo 'class="active"';
			}
			echo '>*';
			
			$post_num++;
			echo '</li>';
			
			endwhile; ?>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
      <?php 
			$post_num = 0;
            $query = new WP_Query(array( 'post_type' => 'slide'));
			while ( $query->have_posts() ) : $query->the_post();
			$post_num++;
			// Image swaps?
			$attachment_id = get_field('slide_image');
			$size = "home-carousel";
			$image = wp_get_attachment_image_src( $attachment_id, $size );
            echo '<div class="item ';
			if($post_num == 1){ 
				echo 'active';
			}
			echo '"><img src="';
			echo $image[0];
			echo '" alt="';
			the_title();
			echo '" /><div class="carousel-caption">';
			echo '<h4>';
			the_title();
			echo '</h4>';
			echo '</div></div>';
			
			endwhile; ?>
    </div>
    
    <!-- Carousel nav --> 
    <!-- Carousel nav -->
    <div class="visible-phone"><a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a> <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="icon-chevron-right"></i></a></div>
  </div>
  <? } else { ?>
  <?php if (get_field('header_image')) { 
			$banner_id = get_field('header_image');
			$banner_size = "page-headers";
			$banner_image = wp_get_attachment_image_src( $banner_id, $banner_size );
			echo '<img src="';
			echo $banner_image[0];
			echo '" alt="';
			the_title();
			echo '"/>';
	
	} else { ?>
  <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/banners/rotate.php" alt="A Random Header Image" />
  <? } ?>
  <? } ?>
  <div class="carousel-swirl row-fluid"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/carousel-swirl.png" alt="curved graphic" /></div>
</div>
<div class="nav-wrap">
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container nav-container">
        <nav role="navigation"> <a class="btn btn-navbar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse">Menu
          <div class="pull-right"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
          </a>
          <div class="nav-collapse collapse">
            <?php summer_main_nav(); // Adjust using Menus in Wordpress Admin ?>
          </div>
        </nav>
      </div>
      <!-- end .nav-container --> 
    </div>
    <!-- end .navbar-inner --> 
  </div>
  <!-- end .navbar --> </div>
<div id="inner-wrap">
