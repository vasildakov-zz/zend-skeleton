<?php
/**
 * DecoratorPlugin
 * @author Vasil Dakov
 */
namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\I18n\Translator\Translator;

class DecoratorPlugin extends AbstractPlugin {

    #private $status;
    
    public function __construct() {
        $this->translator = new Translator();
    }
    
    public function decorateStatus($status)
    {
        if($status == 1) {
            return '<span class="label label-success">'.$this->translator->translate("Active").'</span>';
        }
        elseif($status == 2) {
            return '<span class="label label-important">'.$this->translator->translate("Inactive").'</span>';
        }
    }
    

    
}