<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use App\Dictrionary\Priorities;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Priority trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait PriorityEntity
{

    /**
     * @var integer
     */
    #[Gedmo\SortableGroup]
    #[ORM\Column(type: Types::INTEGER)]
    private int $priority = 0;

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return $this
     */
    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @param $priority
     * @return string
     */
    public function getPriorityLabel(): string
    {
        return Priorities::$priorityLabels[$this->priority];
    }

    /**
     * @return array
     */
    public static function getPriorityChoices(): array
    {
        return Priorities::$priorityChoices;
    }
}