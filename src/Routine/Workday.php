<?php

namespace App\Routine;

use DateInterval;
use DateTime;

class Workday
{
    /**
     * @var DateTime
     */
    protected $dayStart, $runningTime;

    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param DateTime|null $dayStart
     */
    public function __construct(DateTime $dayStart = null)
    {
        $this->setDayStart((new DateTime)
            ->setTime(6, 15));
        if ($dayStart) {
            $this->setDayStart($dayStart);
        }
        $thirtyMinutes = "30 mins";
        $threeHours = "3 hours";

        $this->runningTime = clone $this->getDayStart();
        $this->addItem('Wake up', '0 mins');
        $this->addItem('Bathroom', $thirtyMinutes);
        $this->addItem('Kitchen', $thirtyMinutes);
        $this->addItem('Work', $threeHours);
        $this->addItem('Lunch', $thirtyMinutes);
        $this->addItem('Work', $threeHours);
        $this->addItem('Exercise/Snack', $thirtyMinutes);
        $this->addItem('Work', $threeHours);
        $this->addItem('Dance', $thirtyMinutes);
    }

    /**
     * @return DateTime
     */
    public function getDayStart(): DateTime
    {
        return $this->dayStart;
    }

    /**
     * @param DateTime $dayStart
     */
    public function setDayStart(DateTime $dayStart): void
    {
        $this->dayStart = $dayStart;
    }

    /**
     * @param string $name
     * @param string $duration
     * @return void
     */
    public function addItem($name, $duration)
    {
        if (count($this->items)) {
            $this->items[] = new RoutineItem($name,
                clone $this->getRunningTime()->add(end($this->items)->getDuration()),
                DateInterval::createFromDateString($duration));
        } else {
            // First item exception
            $this->items[] = new RoutineItem($name, clone $this->getDayStart(),
                DateInterval::createFromDateString($duration));
        }

    }

    /**
     * @return DateTime
     */
    protected function getRunningTime(): DateTime
    {
        return $this->runningTime;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @param DateTime $runningTime
     */
    protected function setRunningTime(DateTime $runningTime): void
    {
        $this->runningTime = $runningTime;
    }


}