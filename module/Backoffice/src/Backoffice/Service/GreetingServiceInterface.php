<?php

namespace Backoffice\Service;

use Backoffice\Service\GreetingService\HourProviderInterface;

interface GreetingServiceInterface {

    public function getGreeting();

    public function setHourProvider(HourProviderInterface $hourProvider);

    public function getHourProvider();
}