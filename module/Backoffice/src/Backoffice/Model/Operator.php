<?php
namespace Backoffice\Model;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Operator implements InputFilterAwareInterface
{
    public $id;
    public $name;
    public $status;
    
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->status = (isset($data['status'])) ? $data['status'] : null;
    }
    
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}