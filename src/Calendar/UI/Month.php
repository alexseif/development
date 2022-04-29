<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Calendar\UI;

use DateInterval;
use DatePeriod;
use DateTime;
use Exception;

class Month
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
        $firstOfMonth = new DateTime($this->today->format('Y-m-01'));
        $firstOfMonthDayOfTheWeek = $firstOfMonth->format('N');
        $extraDays = (7 > $firstOfMonthDayOfTheWeek) ? $firstOfMonthDayOfTheWeek : 0;
        $firstDayOfTheCalendar = new DateTime($this->today->format('Y-m-01'));
        $firstDayOfTheCalendar->modify('-' . $extraDays . ' days');
        return $firstDayOfTheCalendar;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function getLastDayOfCalendar(): DateTime
    {
        $lastOfMonth = new DateTime($this->today->format('Y-m-t'));
        $lastOfMonthDayOfTheWeek = $lastOfMonth->format('N');
        $extraDays = 7 - $lastOfMonthDayOfTheWeek;
        $extraDays = ($extraDays) ?: 6;
        $lastDayOfTheCalendar = new DateTime($this->today->format('Y-m-t'));
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