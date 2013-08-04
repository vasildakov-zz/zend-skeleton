<?php
// Application/src/Application/View/Helper/TestHelper.php
// Test Helper Example
// Source: http://samsonasik.wordpress.com/2012/07/20/zend-framework-2-create-your-custom-view-helper/

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;
 
class TestHelper extends AbstractHelper
{
    public function __invoke($str, $find)
    {
        if (! is_string($str)){
            return 'must be string';
        }
 
        if (strpos($str, $find) === false){
            return 'not found';
        }
 
        return '<p>TestHelper: <b>found</b></p>';
    }
}