<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Nameable trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait NamedEntity
{
    /**
     * @var string
     */
    #[ORM\Column(type: Types::STRING, length: 255)]
    private $name;

    /**
     * Returns name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}