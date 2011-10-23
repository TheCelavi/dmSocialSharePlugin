<?php

//if ($sf_user->can('zone_add, widget_add')) use_javascript ('/dmFacebookSocialPluginsPlugin/js/dmFacebookSocialPluginPlugins.js');

echo sprintf( 
'<div id="fb-root" class="dmWidgetFacebookSocialPlugins"></div>
 <script src="http://connect.facebook.net/en_US/all.js#xfbml=1">
 </script><fb:like ref="%s" href="%s" send="%s" layout="%s" width="%s" show_faces="%s" action="%s" colorscheme="%s" font="%s"></fb:like>', 
        $ref,
        $sf_request->getUri(),
        ($sendButton) ? 'true':'false',
        $layout,
        $width,
        ($showFaces) ? 'true':'false',
        $verb,
        $colorScheme,
        $font
        );
?>
