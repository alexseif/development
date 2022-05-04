<?php

namespace App\Entity;

use App\Entity\Traits\NamedEntity;
use App\Repository\ChronometerRepository;
use DateInterval;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ChronometerRepository::class)]
class Chronometer
{
    use NamedEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $start;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $stop;

    #[ORM\Column(type: 'dateinterval', nullable: true)]
    private $interval;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $seconds;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStart(): ?DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getStop(): ?DateTimeInterface
    {
        return $this->stop;
    }

    public function setStop(?DateTimeInterface $stop): self
    {
        $this->stop = $stop;

        return $this;
    }

    public function getInterval(): ?DateInterval
    {
        return $this->interval;
    }

    public function setInterval(?DateInterval $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    public function getSeconds(): ?int
    {
        return $this->seconds;
    }

    public function setSeconds(?int $seconds): self
    {
        $this->seconds = $seconds;

        return $this;
    }
}
