<?php

namespace App\Entity;

use App\Entity\Traits\DescribedEntity;
use App\Entity\Traits\NamedEntity;
use App\Entity\Traits\PriorityEntity;
use App\Entity\Traits\SortableEntity;
use App\Entity\Traits\TypeEntity;
use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    use TypeEntity;
    use NamedEntity;
    use DescribedEntity;
    use SortableEntity;
    use PriorityEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: ItemList::class, inversedBy: 'items')]
    private $itemList;


    public function getId(): ?int
    {
        return $this->id;

    }

    public function getItemList(): ?ItemList
    {
        return $this->itemList;
    }

    public function setItemList(?ItemList $itemList): self
    {
        $this->itemList = $itemList;

        return $this;
    }


}
