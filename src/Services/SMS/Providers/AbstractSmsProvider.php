<?php

namespace Itech\Auth\Services\SMS\Providers;

abstract class AbstractSmsProvider
{
    protected string $url;

    abstract function send($to, $data);
}
