<?php
echo sprintf(
        '<div id="fb-root"></div>
         <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
         <fb:comments ref="%s" href="%s" num_posts="%s" width="%s" colorscheme="%s"></fb:comments>',
        $ref,
        $sf_request->getUri(),
        $noOfPosts,
        $width,
        $colorScheme
        );