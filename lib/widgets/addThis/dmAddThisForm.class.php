<?php
/**
 * Description of dmAddThisForm
 *
 * @author TheCelavi
 */
class dmAddThisForm extends dmWidgetPluginForm {
    
    protected $styles = array(
        'default'=> 'Default style',
        '32x32_style'=>'32x32 icons'
    );
    
    protected $counter_styles = array(
        'bubble_style' => 'Bubble style',
        'pill_style' => 'Pill style'
    );
    
    public function configure() {
        parent::configure();
        $services = dmAddThisFetchServices::fetchServices();
        // Services
        $this->widgetSchema['services'] = new sfWidgetFormMultiselect(
                array(
                    'choices'=>$services
                )
        );
        $this->validatorSchema['services'] = new sfValidatorChoice(
                array(
                    'choices'=>  array_keys($services),
                    'multiple'=> true,
                    'min'=>1
                )
        );
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

        $this->widgetSchema['use_addthis_counter'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['use_addthis_counter']->setLabel('Display counter');
        $this->validatorSchema['use_addthis_counter'] = new sfValidatorBoolean();
        
        $this->widgetSchema['addthis_counter_style'] = new sfWidgetFormSelect(
                array(
                    'choices' => $this->counter_styles
                )
        );
        $this->widgetSchema['addthis_counter_style']->setLabel('Counter style');
        $this->validatorSchema['addthis_counter_style'] = new sfValidatorChoice(
                array(
                    'choices'=>  array_keys($this->counter_styles)
                )
        );
    }
    
}

?>
