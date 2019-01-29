<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'debug.argument_resolver.service' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ArgumentValueResolverInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ArgumentResolver/TraceableValueResolver.php';
include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ArgumentResolver/ServiceValueResolver.php';

return $this->privates['debug.argument_resolver.service'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\ServiceValueResolver(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, array(
    'App\\Controller\\MovieController::newMovie' => array('privates', '.service_locator.Q1FK6fC', 'get_ServiceLocator_Q1FK6fCService.php', true),
    'App\\Controller\\PersonController::newPerson' => array('privates', '.service_locator.L5RCMeM', 'get_ServiceLocator_L5RCMeMService.php', true),
    'App\\Controller\\MovieController:newMovie' => array('privates', '.service_locator.Q1FK6fC', 'get_ServiceLocator_Q1FK6fCService.php', true),
    'App\\Controller\\PersonController:newPerson' => array('privates', '.service_locator.L5RCMeM', 'get_ServiceLocator_L5RCMeMService.php', true),
))), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))));
