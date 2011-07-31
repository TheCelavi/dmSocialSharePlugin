<?php
echo sprintf(
        '<div id="fb-root"></div>
         <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
         <fb:send ref="%s" href="%s" font="%s" colorscheme="%s"></fb:send>',
        $ref,
        $sf_request->getUri(),
        $font,
        $colorScheme
        );