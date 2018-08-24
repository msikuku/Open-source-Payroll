<?php

namespace CleaniqueCoders\OpenPayroll\Processors\Earning;

class BasicEarningProcessor extends BaseEarningProcessor
{
    public function calculate()
    {
        return $this->earning->amount;
    }
}
