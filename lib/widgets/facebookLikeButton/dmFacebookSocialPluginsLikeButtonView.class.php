<?php
/**
 * Description of dmLikeButtonView
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsLikeButtonView extends dmWidgetPluginView {

    protected function filterViewVars(array $vars = array()) {
        $vars['sendButton'] = (isset($vars['sendButton'])) ? $vars['sendButton'] : false;
        $vars['showFaces'] = (isset($vars['showFaces'])) ? $vars['showFaces'] : false;
        $vars = parent::filterViewVars($vars);
        return $vars;
    }
    
}

?>
