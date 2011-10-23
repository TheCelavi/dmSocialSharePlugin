<?php
/**
 * Description of 
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsLikeBoxForm extends dmWidgetPluginForm {
       
    protected $colorScheme = array(
        'light' => 'Light',
        'dark' => 'Dark'
    );
    
    public function configure() {
        parent::configure();
        
        // Domain
        $this->widgetSchema['domain'] = new sfWidgetFormInputText();
        $this->validatorSchema['domain'] = new sfValidatorUrl(
                array(
                    'required'=> true                    
                )
        );
        $this->widgetSchema['domain']->setLabel('Facebook page URL');
                
        // Width
        $this->widgetSchema['width'] = new sfWidgetFormInputText();
        $this->validatorSchema['width'] = new sfValidatorInteger(
                array(
                    'required'=> true,
                    'min' => 200
                )
        );
        if (!$this->getDefault('width')) {
            $this->setDefault('width', '300');
        }
        
        // Color scheme
        $this->widgetSchema['colorScheme'] = new sfWidgetFormChoice(array(
            'choices' => $this->getService('i18n')->translateArray($this->colorScheme),
            'default' => 'light'
        ));
        $this->widgetSchema['colorScheme']->setLabel('Choose color scheme');
        $this->validatorSchema['colorScheme'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->colorScheme)
        ), array(
            'required' =>'Please, choose a color scheme'
        ));
        if (!$this->getDefault('colorScheme')) {
            $this->setDefault('colorScheme', 'light');
        }
        
        // Show faces
        $this->widgetSchema['showFaces'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showFaces'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['showFaces']->setLabel('Show faces');
        
        // Show stream
        $this->widgetSchema['showStream'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showStream'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['showStream']->setLabel('Show stream');
        
        // Show header
        $this->widgetSchema['showHeader'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showHeader'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['showHeader']->setLabel('Show header');
               
        // Ref
        $this->widgetSchema['ref'] = new sfWidgetFormInputText();
        $this->validatorSchema['ref'] = new sfValidatorRegex(
                array(
                    'required'=> true,
                    'pattern'=>'/^\w+$/'
                )
        );
        if (!$this->getDefault('ref')) {
            $this->setDefault('ref', dmString::random());
        }
        $this->widgetSchema['ref']->setLabel('Widget unique ID');
        $this->widgetSchema->setHelp('ref', 'ID helps to identify this widget. Use chars, numbers and underscores to label it.');
    }
    
}

?>
