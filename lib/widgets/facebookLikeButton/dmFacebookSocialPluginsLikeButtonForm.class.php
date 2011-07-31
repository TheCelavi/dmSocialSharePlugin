<?php
/**
 * Description of dmLikeButtonForm
 *
 * @author TheCelavi
 */
class dmFacebookSocialPluginsLikeButtonForm extends dmWidgetPluginForm {
    
    protected $styles = array(
            'standard'=> 'Standard',
            'button_count'=>'Button count',
            'box_count'=>'Box count'
        );

    protected $verb = array(
        'like' => 'Like',
        'recommend' => 'Recommend'
    );
    
    protected $font = array(
        'arial'=> 'Arial',
        'lucida grande' => 'Lucida grande',
        'segoe ui'=> 'Segoe UI',
        'tahoma' => 'Tahoma',
        'trebuchet ms' => 'Trebuchet MS',
        'verdana' => 'Verdana'
    );
    
    private $colorScheme = array(
        'light' => 'Light',
        'dark' => 'Dark'
    );
    
    public function configure() {
        parent::configure();
        // Send button
        $this->widgetSchema['sendButton'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['sendButton'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['sendButton']->setLabel('Send button');
        // Layout
        $this->widgetSchema['layout'] = new sfWidgetFormChoice(array(
            'choices' => $this->getService('i18n')->translateArray($this->styles),
            'default' => 'standard'
        ));
        $this->widgetSchema['layout']->setLabel('Layout style');
        $this->validatorSchema['layout'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->styles)
        ), array(
            'required' =>'Please, choose a layout'
        ));
        if (!$this->getDefault('layout')) {
            $this->setDefault('layout', 'standard');
        }
        // Width
        $this->widgetSchema['width'] = new sfWidgetFormInputText();
        $this->validatorSchema['width'] = new sfValidatorInteger(
                array(
                    'required'=> true,
                    'min' => 40
                )
        );
        if (!$this->getDefault('width')) {
            $this->setDefault('width', '400');
        }
        // Show faces                
        $this->widgetSchema['showFaces'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showFaces'] = new sfValidatorBoolean(array('required' => false));
        $this->widgetSchema['showFaces']->setLabel('Show faces');
        // Verb
        $this->widgetSchema['verb'] = new sfWidgetFormChoice(array(
            'choices' => $this->getService('i18n')->translateArray($this->verb),
            'default' => 'like'
        ));
        $this->widgetSchema['verb']->setLabel('Verb to display');
        $this->validatorSchema['verb'] = new sfValidatorChoice(array(
            'choices' => array_keys($this->verb)
        ), array(
            'required' =>'Please, choose a verb'
        ));
        if (!$this->getDefault('verb')) {
            $this->setDefault('verb', 'like');
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
