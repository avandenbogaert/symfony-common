<?php
namespace Avdb\SymfonyCommon\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DoctrineIdentifiable
 *
 * @package Avdb\SymfonyCommon\Entity
 * @ORM\MappedSuperclass()
 */
trait DoctrineIdentifiable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    protected $id;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
