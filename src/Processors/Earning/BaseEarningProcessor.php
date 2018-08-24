<?php

namespace CleaniqueCoders\OpenPayroll\Processors\Earning;

class BaseEarningProcessor
{
    public $earning;

    public function __construct($identifier)
    {
        if (is_string($identifier) || is_int($identifier)) {
            $this->earning = config('open-payroll.models.earning')::query()
                ->with('type')
                ->findByHashSlugOrId($identifier);
        }

        if (is_object($identifier)) {
            $this->earning($identifier);
        }
    }

    public static function make($identifier)
    {
        return new self($identifier);
    }

    public function earning($earning)
    {
        $this->earning = $earning;

        return $this;
    }

    abstract public function calculate();
}
