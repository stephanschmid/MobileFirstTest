<?php

namespace  Edge5\BackendBundle\Admingenerator\UserBundle\Twig\Extension;

use Admingenerator\UserBundle\Twig\Extension\ExtendsMyConfiguredLayoutExtension;

class MyConfiguredLayoutExtension extends ExtendsMyConfiguredLayoutExtension
{
    public function __construct($loader)
    {
        $this->loader = $loader;
    }
}
