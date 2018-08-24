<?php

namespace CleaniqueCoders\OpenPayroll\Traits;

trait MakeInstance
{
    public $instance;

    public function __construct($identifier)
    {
        if (is_string($identifier) || is_int($identifier)) {
            $this->instance = $this->getModel()::query()
                ->with('type')
                ->findByHashSlugOrId($identifier);
        }

        if (is_object($identifier)) {
            $this->instance($identifier);
        }
    }

    public static function make($identifier)
    {
        return new self($identifier);
    }

    public function instance($instance)
    {
        $this->instance = $instance;

        return $this;
    }

    abstract public function getModel();
}
