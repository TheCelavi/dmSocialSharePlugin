<?php
/**
 * Description of dmSendButtonForm
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsSendButtonForm extends dmWidgetPluginForm {
    
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
        $this->widgetSchema['ref']->setLabel('Button unique ID');
        $this->widgetSchema->setHelp('ref', 'ID helps to identify this button. Use chars, numbers and underscores to label it.');
    }
    
}

?>
