<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Calendar\UI;

use DateInterval;
use DatePeriod;
use DateTime;
use Exception;

class Week
{
    public $today, $period;

    /**
     * @param DateTime $today
     */
    public function __construct(DateTime $today)
    {
        $this->today = $today;
        $interval = DateInterval::createFromDateString('1 day');
        $this->period = new DatePeriod($this->getFirstDayOfCalendar(), $interval, $this->getLastDayOfCalendar());
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getFirstDayOfCalendar(): DateTime
    {
        $dayOfTheWeek = (int)$this->today->format('N');
        switch ($dayOfTheWeek) {
            case 6:
                $extraDays = 0;
                break;
            case 7:
                $extraDays = 1;
                break;
            default:
                $extraDays = 1 + $dayOfTheWeek;
                break;
        }
        $weekStart = new DateTime($this->today->format('Y-m-d 00:00:00'));
        $weekStart->modify('-' . $extraDays . ' days');
        return $weekStart;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function getLastDayOfCalendar(): DateTime
    {
        $dayOfTheWeek = $this->today->format('N');
        switch ($dayOfTheWeek) {
            case 6:
                $extraDays = 6;
                break;
            case 7:
                $extraDays = 5;
                break;
            default:
                $extraDays = 5 - $dayOfTheWeek;
                break;
        }
        $lastDayOfTheCalendar = new DateTime($this->today->format('Y-m-d 00:00:01'));
        $lastDayOfTheCalendar->modify($extraDays . ' days');
        return $lastDayOfTheCalendar;
    }

    /**
     * @return mixed
     */
    public function getToday()
    {
        return $this->today;
    }

    /**
     * @param mixed $today
     */
    public function setToday($today): void
    {
        $this->today = $today;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period): void
    {
        $this->period = $period;
    }
}