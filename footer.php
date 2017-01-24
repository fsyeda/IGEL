    
    </div><!-- close id page content div -->
        
        <footer>

            <div id="inner-footer" class="vertical-nav">

                <div class="container"><div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-col">
                        <?php wp_nav_menu( array('menu' => 'Footer 1','menu_class' => 'menu', 'menu_id' => 'menu-footer-menu-1' )); ?>
                        <div class="address hidden-sm hidden-xs">
                          540 Howard St 3rd Floor<br />
                          San Francisco, CA 94105<br />
                          <a href="tel:1-845-589-5900" class="phone" title="IGEL Phone">+1 845 589 5900</a>
                        </div>
                        <a href="/wp-content/uploads/2017/01/ISO_recertification.pdf" target="_blank" class="yellow iso-link">ISO Certifications</a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-col">
                        <?php wp_nav_menu( array('menu' => 'Footer 2','menu_class' => 'menu', 'menu_id' => 'menu-footer-menu-2' )); ?>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-col solutions-footer-menu">
                        <?php wp_nav_menu( array('menu' => 'Footer 3','menu_class' => 'menu', 'menu_id' => 'menu-footer-menu-3' )); ?>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-md-3 footer-menu-col">
                        <div class="social"> 
                        <p><?php echo __('Connect with us', 'igel');?></p>
                              <div class="social-icons">

                                  <a href="https://www.linkedin.com/company/igel-technology" title="LinkedIn - IGEL" target="_blank"><span class="icon in"></span></a>
                                  <a href="https://twitter.com/IGEL_Tech_DACH/" title="Twitter - IGEL" target="_blank"><span class="icon tw"></span></a>
                                  <a href="https://www.facebook.com/igel.technology" title="Facebook - IGEL" target="_blank"><span class="icon fb"></span></a>
                                  <a href="https://plus.google.com/u/0/101270758605662221044/posts" title="Google+ - IGEL" target="_blank"><span class="icon gp"></span></a>
                                  <a href="https://www.youtube.com/user/IGELTechnologyTV" title="Youtube - IGEL" target="_blank"><span class="icon yt"></span></a>
                              </div>
                        </div>
                        <div class="newsletter-form">
                          <p><?php echo __('Subscribe to our newsletter', 'igel'); ?></p>
                          <form id="subscribe-newsletter" action="#">
                            <div class="input-group">
                              <label for="customer-subscribe"><input type="checkbox" name="customer-subscribe" id="customer-subscribe" value="True"/> Customer</label>
                              <label for="technical-subscribe"><input type="checkbox" name="technical-subscribe" id="technical-subscribe" value="True"/> Technical</label>
                              <label for="channel-subscribe"><input type="checkbox" name="channel-subscribe" id="channel-subscribe" value="True"/> Channel</label>
                            </div>
                            <?php wp_nonce_field('subscribe_newsletter_action','subscribe_newsletter_nonce');?>
                            <div class="input-group email-submit">
                              <input type="text" name="email" id="subscribe_email" required placeholder="Your Email" />
                              <input type="submit" value="submit" />
                            </div>
                            <div class="subscribe_newsletter_mess"></div>                            
                          </form>
                          <p><a href="/unsubscribe-igel-news/" title="unsubscribe" class="unsubscribe">Unsubscribe</a></p>
                        </div>
                        <div class="int-links">
                        <a href="http://igel.de" title="Igel Deutschland">IGEL Deutsch</a>
                        <a href="http://igel.fr" title="Igel France">IGEL Français</a>
                        </div>
                         <div class="address visible-sm visible-xs">
                          540 Howard St 3rd Floor<br />
                          San Francisco, CA 94105<br />
                          <a href="tel:1-845-589-5900" class="phone" title="IGEL Phone">+1 845 589 5900</a>
                        </div>

                      </div>

                      <div class="col-xs-12 bottom-sentence">
                      <?php echo __('IGEL is a world leader in endpoint management software, software-defined thin clients, and thin and zero client solutions. IGEL-managed workspace solutions provide true enterprise management, allowing IT departments to easily manage PCs, notebooks, thin and zero clients under one robust platform. ', 'igel'); ?>
                      </div>
                  </div></div>
            </div>
            <div class="copyright">
              <div class="container"><div class="row">
                <div class="col-xs-12">
                  <?php wp_nav_menu( array('menu' => 'Footer Bottom','menu_class' => 'bottom-menu', 'menu_id' => 'menu-footer-bottom' )); ?>
                  </div>
                  <div class="col-xs-12 copy">
                        <p>© IGEL <?php echo date('Y'); ?>. <?php echo __('ALL RIGHTS RESERVED', 'igel'); ?></p>
                   <?php //wp_nav_menu( array('menu' => 'Bottom Footer','menu_class' => 'menu', 'menu_id' => 'menu-footer-bottom' )); ?>
                </div>
             </div></div>
          </div>
        </footer>
    <div class="overlay_menu"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTbfPiCXKekSISVthNgH-UFmKpz0ALlZ0"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/inc/js/jquery.validate.js' ;?>"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/inc/js/jquery.modal.js' ;?>"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/inc/js/fancybox/jquery.fancybox.pack.js' ;?>"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/inc/main.js' ;?>"></script>
    <?php wp_footer(); // js scripts are inserted using this function ?>
    <script>
      (function($){
        $(document).ready(function () {
           $(".fancybox").fancybox();
           $(".fancybox_video").fancybox({
             prevEffect   : 'none',
             nextEffect   : 'none',
             afterShow: function(){
               var idVideo = $(this).attr('href');
               $(idVideo + ' #video-id').get(0).play();
             },
             afterClose: function(){
               var idVideo = $(this).attr('href');
               $(idVideo + ' #video-id').get(0).pause();
             },
             helpers: {
                overlay: {
                  locked: false
                }
            }
           });


      $('#subscribe-newsletter').validate({
   	  	rules: {
   			"customer-subscribe": {
   	   			required: function (element) {
   	   				if( document.getElementById("technical-subscribe").checked || document.getElementById("channel-subscribe").checked){
   	   					return false;
   	   				}
   	   				return true;
   	   			}                
            },
   			"technical-subscribe": {
   	   			required: function (element) {
   	   				if( document.getElementById("customer-subscribe").checked || document.getElementById("channel-subscribe").checked){
   	   					return false;
   	   				}
   	   				return true;
   	   			}                
            },
        "channel-subscribe": {
            required: function (element) {
              if( document.getElementById("customer-subscribe").checked || document.getElementById("technical-subscribe").checked){
                return false;
              }
              return true;
            }                
            },
        email: {
  				required: true,
  				email: true
			     },
   		},
   		messages: {
   			"customer-subscribe": "Please select at least 1 type",
   			"technical-subscribe": "",
        "channel-subscribe": "",		    
   			email: "Please enter a valid email address"
   		},
   		errorLabelContainer: $(".subscribe_newsletter_mess")
   	  });
      $('#customer-subscribe,#technical-subscribe,#channel-subscribe').bind('change',function(){
    	$(".subscribe_newsletter_mess").html('');
      	if(!$('#subscribe-newsletter').valid()) return false;
      });
      $('#subscribe-newsletter').bind('submit',function(){
    	if(!$('#subscribe-newsletter').valid()) return false;
        var form_value = $('#subscribe-newsletter').serialize();
        $.ajax({
          type : "post",
          dataType : "json",
          url : '<?php echo admin_url( 'admin-ajax.php' );?>',
          data : {
            action: "subscribe_newsletter", 
            data : form_value,
            nonce: $("#subscribe_newsletter_nonce").val()
          },
          context: this,
          beforeSend: function(){
              $('.subscribe_newsletter_mess').html('Loading ...').show();
          },
          success: function(response) {
            if(response.success) {
              $('#subscribe-newsletter')[0].reset();
              $('.subscribe_newsletter_mess').html(response.data).show();              
              setTimeout(function(){
          	  	window.location.assign('<?php echo home_url('/subscribe-thank-you/');?>');
      		  },1000);
            }else {
              $('.subscribe_newsletter_mess').html(response.data).show();
            }
          }
        })
        return false;
      });
                     
        });
      })(jQuery);
    </script>

    <!-- Start of LiveChat (www.livechatinc.com) code -->
      <script type="text/javascript">
      if (matchMedia('only screen and (min-width: 1025px)').matches) {
        window.__lc = window.__lc || {};
        window.__lc.license = 8444971;
        (function() {
          var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
          lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
        })();
       } 
      </script>
      <!-- End of LiveChat code -->
</body>
</html>