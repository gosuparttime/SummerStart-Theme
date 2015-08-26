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
<!-- Piwik -->
<script type="text/javascript">
 var _paq = _paq || [];
 _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
 _paq.push(["setCookieDomain", "*.syr.edu"]);
 _paq.push(["setDomains", ["*.syr.edu"]]);
 _paq.push(['trackPageView']);
 _paq.push(['enableLinkTracking']);
 (function() {
   var u="//its-suwi.syr.edu/";
   _paq.push(['setTrackerUrl', u+'piwik.php']);
   _paq.push(['setSiteId', 1]);
   var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
   g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
 })();
</script>
<noscript><p><img src="//its-suwi.syr.edu/piwik.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body></html>