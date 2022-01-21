<?php

namespace Itech\Auth\Helpers;

class PhoneFormatterHelper
{
    public function clear(string $phone): array|string|null
    {
        return preg_replace('/[^0-9]/', '', $phone);
    }
}
