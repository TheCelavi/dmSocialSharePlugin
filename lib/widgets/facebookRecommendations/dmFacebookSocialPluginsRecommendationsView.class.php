<?php
/**
 * Description of 
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsRecommendationsView extends dmWidgetPluginView {

    protected function filterViewVars(array $vars = array()) {
        $vars['showHeader'] = (isset($vars['showHeader'])) ? $vars['showHeader'] : false;
        $vars = parent::filterViewVars($vars);
        return $vars;
    }
    
}

?>
