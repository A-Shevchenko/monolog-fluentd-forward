<?php

namespace Ashevchenko\Monolog\Fluentd\Forward;

interface PackerInterface
{
    public function pack($value);
}