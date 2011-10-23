<?php

echo sprintf('
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