<?php

namespace Backoffice\Service\GreetingService;

use Backoffice\Service\GreetingService\HourProviderInterface;

class HourProviderDateFunction implements HourProviderInterface {

    public function getHour()
    {
        return date("H");
    }

}