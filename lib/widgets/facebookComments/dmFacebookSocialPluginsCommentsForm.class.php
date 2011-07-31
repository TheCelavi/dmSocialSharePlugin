<?php
/**
 * Description of 
 * 
 * @author TheCelavi
 */
class dmFacebookSocialPluginsCommentsForm extends dmWidgetPluginForm {
         
    protected $colorScheme = array(
        'light' => 'Light',
        'dark' => 'Dark'
    );
    
    public function configure() {
        parent::configure();
        
        // Number of posts
        $this->widgetSchema['noOfPosts'] = new sfWidgetFormInputText();
        $this->validatorSchema['noOfPosts'] = new sfValidatorInteger(
                array(
                    'required'=> true,
                    'min' => 1
                )
        );
        if (!$this->getDefault('noOfPosts')) {
            $this->setDefault('noOfPosts', '5');
        }
        $this->widgetSchema['noOfPosts']->setLabel('Number of posts');
        
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
