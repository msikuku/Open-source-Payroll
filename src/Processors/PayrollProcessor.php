<?php

namespace CleaniqueCoders\OpenPayroll\Processors;

class PayrollProcessor
{
    public function __construct()
    {
    }

    public static function make()
    {
        return new static();
    }
}
