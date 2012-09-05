<?php

/* echo sprintf('
        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
        <fb:recommendations ref="%s" site="%s" width="%s" height="%s" header="%s" colorscheme="%s"  font="%s" border_color="%s"></fb:recommendations>
        ',
        $ref,
        $domain,
        $width,
        $height,
        ($showHeader) ? 'true':'false',
        $colorScheme,
        $font,
        $borderColor
);
*/
echo sprintf('
    
<div ref="%s" class="fb-recommendations" data-site="%s" data-width="%s" data-height="%s" data-header="%s" data-colorscheme="%s" data-border-color="%s" data-font="%s"></div>
    
',
        $ref,
         $domain,
        $width,
        $height,
        ($showHeader) ? 'true':'false',
        $colorScheme,
        $borderColor,
        $font
        );

echo '<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>';