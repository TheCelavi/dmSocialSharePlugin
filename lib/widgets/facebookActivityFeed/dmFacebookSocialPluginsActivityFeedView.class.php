<?php
/**
 * Description of dmLikeButtonView
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsActivityFeedView extends dmWidgetPluginView {

    protected function filterViewVars(array $vars = array()) {
        $vars['showHeader'] = (isset($vars['showHeader'])) ? $vars['showHeader'] : false;
        $vars['showRecommendations'] = (isset($vars['showRecommendations'])) ? $vars['showRecommendations'] : false;
        $vars = parent::filterViewVars($vars);
        return $vars;
    }
    
}

?>
