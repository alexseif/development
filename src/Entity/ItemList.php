<?php

namespace App\Entity;

use App\Entity\Traits\NamedEntity;
use App\Repository\ItemListRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ItemListRepository::class)]
class ItemList
{
    use NamedEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'itemList', targetEntity: Item::class)]
    private $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setItemList($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        // set the owning side to null (unless already changed)
        if ($this->items->removeElement($item) && $item->getItemList() === $this) {
            $item->setItemList(null);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

}
