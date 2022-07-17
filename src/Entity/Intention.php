<?php

namespace App\Entity;

use App\Entity\Traits\DescribedEntity;
use App\Repository\IntentionRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: IntentionRepository::class)]
class Intention
{
    use DescribedEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;


    public function getId(): ?int
    {
        return $this->id;
    }

}
