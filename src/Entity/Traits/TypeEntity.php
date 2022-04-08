<?php
/**
 * The following content was designed & implemented under AlexSeif.com
 **/

namespace App\Entity\Traits;

use App\Dictrionary\Types;
use App\Entity\Item;
use App\Exceptions\TypeNotFoundException;
use Doctrine\ORM\Mapping as ORM;


/**
 * Type trait
 *
 * @author Alex Seif <alex.seif@gmail.com>
 */
trait TypeEntity
{
    #[ORM\Column(type: 'string', length: 255)]
    private $type = 'item';

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return TypeEntity|Item
     * @throws TypeNotFoundException
     */
    public function setType(string $type): self
    {
        if (in_array($type, self::geTypeChoices())) {
            $this->type = $type;
        } else {
            throw new TypeNotFoundException();
        }

        return $this;
    }

    /**
     * @return array
     */
    public static function geTypeChoices(): array
    {
        return Types::$typeChoices;
    }

    /**
     * @param $priority
     * @return string
     */
    public function getTypeLabel(): string
    {
        return Types::$typeLabels[$this->type];
    }
}