<?php

echo sprintf('
        <div id="fb-root"></div>
        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
        <fb:like-box ref="%s" href="%s" width="%s" show_faces="%s" stream="%s" header="%s"></fb:like-box>
        ',
        $ref,
        $domain,
        $width,
        ($showFaces) ? 'true':'false',
        ($showStream) ? 'true':'false',
        ($showHeader) ? 'true':'false'
);