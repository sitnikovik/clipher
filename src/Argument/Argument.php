<?php

namespace Sitnikovik\CliBeatify\Argument;

class Argument
{
    /**
     * @var int
     */
    protected $cliIndex;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var bool
     */
    private $isRequired;

    /**
     * @var string
     */
    private $description;

    /**
     * @param int $cliIndex
     * @param string $alias
     * @param bool $isRequired
     * @param string $description
     */
    public function __construct($cliIndex, $alias, $isRequired = false, $description = '')
    {
        $this->cliIndex = $cliIndex;
        $this->alias = $alias;
        $this->isRequired = false;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getCliIndex()
    {
        return $this->cliIndex;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
        return $this->isRequired;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}