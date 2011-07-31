<?php
/**
 * Description of dmAddThisForm
 *
 * @author TheCelavi
 */
class dmAddThisForm extends dmWidgetPluginForm {
    
    protected $styles = array(
        'default'=> 'Default style',
        'default_32'=>'32x32 icons',
        'aqua_64'=>'64x64 aqua icons'
    );
    
    public function configure() {
        parent::configure();
        $services = dmAddThisFetchServices::fetchServices();
        // Style
        $this->widgetSchema['style'] = new sfWidgetFormChoice(array(
            'choices' => $this->getService('i18n')->translateArray($this->styles),
            'default' => 'default'
        ));
        $this->widgetSchema['style']->setLabel('Choose style');
        $this->validatorSchema['style'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->styles)
        ), array(
            'required' =>'Please, choose a style'
        ));        
        if (!$this->getDefault('style')) {
            $this->setDefault('style', 'default');
        }

        
        $this->widgetSchema['services'] = new sfWidgetFormChoice(
                array(
                    'choices'=>$services,
                    'multiple'=>true,
                    'expanded'=>true
                )
        );
        $this->validatorSchema['services'] = new sfValidatorChoice(
                array(
                    'choices'=>  array_keys($services)
                )
        );
    }
    
}

?>
