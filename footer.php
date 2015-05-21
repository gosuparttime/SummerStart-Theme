</div></div>

<footer role="contentinfo"><div class="container">
  <div id="inner-footer" class="clearfix row-fluid">
   <div class="span9">
   <a href="#top" class="go-up">Back to Top <i class="icon-arrow-up"></i></a>
    <div class="clearfix" id="footer-nav">
      <?php summer_footer_links(); // Adjust using Menus in Wordpress Admin ?>
    </div>
    <div class="clearfix" id="extra-nav">
      <?php summer_extra_links(); // Adjust using Menus in Wordpress Admin ?>
    </div>
    <p class="mar-one-tb"><a href="https://www.facebook.com/pages/Syracuse-University-SummerStart/146962612023814" target="_blank">SummerStart On Facebook <i class="icon-facebook-sign icon-2x"></i></a></p>
    <p class="attribution"><strong>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> at Syracuse University</strong><br />
      University College<br />
      700 University Ave.<br />
      Syracuse, N.Y. 13244
    </p>
  </div>
  <div class="span3 pad-two-t mar-one-b" id="seal">
  	<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/library/images/UC-Logo.png" alt="University College of Syracuse University" />
  </div>
  </div>
  <!-- end #inner-footer --> 
  </div>
</footer>
<!-- end footer -->

</div>
<!-- end #container -->
<!-- end #rolling-hills --> 
<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>
</body></html>