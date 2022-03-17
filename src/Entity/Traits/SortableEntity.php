<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Sortable trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait SortableEntity
{
    /**
     * @var int
     */
    #[Gedmo\SortablePosition]
    #[ORM\Column(type: Types::INTEGER)]
    private $sortPosition = 0;

    /**
     * @return int
     */
    public function getSortPosition(): ?int
    {
        return $this->sortPosition;
    }

    /**
     * @param int $sortPosition
     * @return $this
     */
    public function setSortPosition(int $sortPosition): self
    {
        $this->sortPosition = $sortPosition;

        return $this;
    }
}