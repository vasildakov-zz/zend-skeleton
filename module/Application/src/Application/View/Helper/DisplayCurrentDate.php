<?php
// Application/src/Application/View/Helper/DisplayCurrentDate.php
// View Helper Example

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class DisplayCurrentDate extends AbstractHelper
{
	public function __invoke()
	{
		return date('d.m.Y');
	}
}
