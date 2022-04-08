<?php

namespace App\Entity;

use App\Entity\Traits\DescribedEntity;
use App\Entity\Traits\NamedEntity;
use App\Entity\Traits\PriorityEntity;
use App\Entity\Traits\SortableEntity;
use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    use NamedEntity;
    use DescribedEntity;
    use SortableEntity;
    use PriorityEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;

    }
}
