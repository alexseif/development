<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Priced trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait PricedEntity
{
    /**
     * @var integer
     */

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    private $price;

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     * @return $this
     */
    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }
}