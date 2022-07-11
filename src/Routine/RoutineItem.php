<?php

namespace App\Routine;

use DateInterval;
use DateTime;

class RoutineItem
{
    /**
     * @var string Routine Item name
     */
    protected $name;

    /**
     * @var DateTime Routine Item Time
     */
    protected $start;

    /**
     * @var DateInterval Routine Item duration
     */
    protected $duration;

    /**
     * @param string $name
     * @param DateTime $start
     * @param DateInterval $duration
     */
    public function __construct(string $name, DateTime $start, DateInterval $duration)
    {
        $this->name = $name;
        $this->start = $start;
        $this->duration = $duration;
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
     * @return DateTime
     */
    public function getStart(): DateTime
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     */
    public function setStart(DateTime $start): void
    {
        $this->start = $start;
    }

    /**
     * @return DateInterval
     */
    public function getDuration(): DateInterval
    {
        return $this->duration;
    }

    /**
     * @param DateInterval $duration
     */
    public function setDuration(DateInterval $duration): void
    {
        $this->duration = $duration;
    }


}