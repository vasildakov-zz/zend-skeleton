<?php
// module/Baclkoffice/src/Service/ErrorHandling.php

/**
 * Simple logging of ZF2 exceptions
 * Author: Rob Allen
 * http://akrabat.com/zend-framework-2/simple-logging-of-zf2-exceptions/
 * http://stackoverflow.com/questions/11686854/how-to-register-a-zend-log-instance-in-the-servicemanager-in-zf2
 */

namespace Backoffice\Service;
 
class ErrorHandling
{
    protected $logger;
 
    public function __construct($logger)
    {
        $this->logger = $logger;
    }
 
    public function logException(\Exception $e)
    {
        $trace = $e->getTraceAsString();
        $i = 1;
        do {
            $messages[] = $i++ . ": " . $e->getMessage();
        } while ($e = $e->getPrevious());
 
        $log  = "Exception:\n" . implode("\n", $messages);
        $log .= "\nTrace:\n" . $trace;
 
        $this->logger->err($log);
    }
}