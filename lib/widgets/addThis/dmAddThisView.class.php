<?php

/**
 * Description of dmAddThisView
 *
 * @author TheCelavi
 */
class dmAddThisView extends dmWidgetPluginView {

    public function configure() {
        parent::configure();
        $this->addRequiredVar(array('style'));
        $this->addRequiredVar(array('services'));
    }

    protected function filterViewVars(array $vars = array()) {
        //$vars['username'] = dmConfig::get("add_this_key");
        $vars = parent::filterViewVars($vars);
        return $vars;
    }

}

?>
