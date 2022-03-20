<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Completeable trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait CompleteableEntity
{
    /**
     * @var integer
     */
    #[ORM\Column(type: Types::BOOLEAN)]
    private $completed = false;

    /**
     * @var DateTimeImmutable
     */
    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private $completedAt;

    /**
     * @return bool
     */
    public function getCompleted(): ?bool
    {
        return $this->completed;
    }


    /**
     * @param bool $completed
     * @return $this
     */
    public function setCompleted(bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getCompletedAt(): ?DateTimeImmutable
    {
        return $this->completedAt;
    }

    /**
     * @param DateTimeImmutable|null $completedAt
     * @return $this
     */
    public function setCompletedAt(?DateTimeImmutable $completedAt): self
    {
        $this->completedAt = $completedAt;
        if ($this->completed && is_null($this->completedAt)) {
            $this->completedAt = new DateTimeImmutable();
        }
        if (!$this->completed && !is_null($this->completedAt)) {
            $this->completedAt = null;
        }
        return $this;
    }
}