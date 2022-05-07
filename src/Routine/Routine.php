<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Routine;

class Routine
{
    /**
     * @var string Routine name
     */
    protected $name;
    /**
     * @var array Routine items
     */
    protected $routine = [];

    /**
     * @param string $name
     * @param array $routine
     */
    public function __construct(string $name, array $routine)
    {
        $this->name = $name;
        $this->routine = $routine;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getRoutine(): array
    {
        return $this->routine;
    }

    /**
     * @param array $routine
     */
    public function setRoutine(array $routine): void
    {
        $this->routine = $routine;
    }


}