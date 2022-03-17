<?php

namespace App\Entity;

use App\Entity\Traits\DescribedEntity;
use App\Entity\Traits\NamedEntity;
use App\Entity\Traits\PricedEntity;
use App\Entity\Traits\PriorityEntity;
use App\Entity\Traits\SortableEntity;
use App\Repository\ExpenseInboxRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ExpenseInboxRepository::class)]
class ExpenseInbox
{
    use NamedEntity;
    use DescribedEntity;
    use PricedEntity;
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
