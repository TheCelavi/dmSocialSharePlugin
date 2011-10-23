<?php
/**
 * Description of 
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsActivityFeedForm extends dmWidgetPluginForm {
           
    protected $font = array(
        'arial'=> 'Arial',
        'lucida grande' => 'Lucida grande',
        'segoe ui'=> 'Segoe UI',
        'tahoma' => 'Tahoma',
        'trebuchet ms' => 'Trebuchet MS',
        'verdana' => 'Verdana'
    );
    
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
        if (!$this->getDefault('domain')) {
            $this->setDefault('domain', 'http://' . sfContext::getInstance()->getRequest()->getHost());
        }
                
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
        
        // Height
        $this->widgetSchema['height'] = new sfWidgetFormInputText();
        $this->validatorSchema['height'] = new sfValidatorInteger(
                array(
                    'required'=> true,
                    'min' => 200
                )
        );
        if (!$this->getDefault('height')) {
            $this->setDefault('height', '300');
        }
        
        // Show header
        $this->widgetSchema['showHeader'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showHeader'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['showHeader']->setLabel('Show header');
        
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
        // Font
        $this->widgetSchema['font'] = new sfWidgetFormChoice(array(
            'choices' => $this->font,
            'default' => 'arial'
        ));
        $this->widgetSchema['font']->setLabel('Choose font');
        $this->validatorSchema['font'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->font)
        ), array(
            'required' =>'Please, choose a font'
        ));
        if (!$this->getDefault('font')) {
            $this->setDefault('font', 'arial');
        }
        
        // Border color
        $this->widgetSchema['borderColor'] = new sfWidgetFormColorPicker();
        $this->validatorSchema['borderColor'] = new sfValidatorColorPicker(
                array(
                    'required'=> false                    
                )
        );
        if (!$this->getDefault('borderColor')) {
            $this->setDefault('borderColor', '');
        }
        $this->widgetSchema['borderColor']->setLabel('Border color');
        
        // Show recommendations
        $this->widgetSchema['showRecommendations'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showRecommendations'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['showRecommendations']->setLabel('Show recommendations');
        
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
