<?php
/**
 * Description of dmLikeButtonView
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsLikeBoxView extends dmWidgetPluginView {

    protected function filterViewVars(array $vars = array()) {
        $vars['showHeader'] = (isset($vars['showHeader'])) ? $vars['showHeader'] : false;
        $vars['showFaces'] = (isset($vars['showFaces'])) ? $vars['showFaces'] : false;
        $vars['showStream'] = (isset($vars['showStream'])) ? $vars['showStream'] : false;
        $vars['domain'] = (!isset($vars['domain']) || $vars['domain']=='') ? 'http://www.facebook.com' : $vars['domain'];
        $vars = parent::filterViewVars($vars);
        return $vars;
    }
    
}

?>
