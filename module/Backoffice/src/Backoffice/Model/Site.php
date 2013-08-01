<?php
namespace Backoffice\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Site
{
    public $id;
    public $url;
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id  = (isset($data['id'])) ? $data['id']  : null;
        $this->url = (isset($data['url'])) ? $data['url'] : null;

    }
    
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
}