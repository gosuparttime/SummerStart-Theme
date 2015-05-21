<div id="sidebar-home" class="row-fluid pad-two-t sidebar hidden-phone clear" role="complementary">
  <?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
  <?php dynamic_sidebar( 'sidebar-home' ); ?>
  <?php else : ?>
  <!-- This content shows up if there are no widgets defined in the backend. -->
  <div class="alert alert-message">
    <p>
      <?php _e("Please activate some Widgets","summerstart"); ?>
      .</p>
  </div>
  <?php endif; ?>
</div>