<?php if(is_front_page()){
	$display = "visible for-phone";
} else {
	$display = "hidden-phone";
}
?>
<div id="sidebar1" class="fluid-sidebar sidebar span4 <? echo $display ?>" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
  <?php dynamic_sidebar( 'sidebar1' ); ?>
  <?php endif; ?>
</div>
