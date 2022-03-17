<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Described trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait DescribedEntity
{
    /**
     * @var string
     */
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private $description;

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}