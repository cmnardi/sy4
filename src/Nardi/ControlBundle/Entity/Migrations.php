<?php

namespace App\Nardi\ControlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Migrations
 *
 * @ORM\Table(name="migrations")
 * @ORM\Entity
 */
class Migrations
{
    /**
     * @var string
     *
     * @ORM\Column(name="migration", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $migration;

    /**
     * @var int
     *
     * @ORM\Column(name="batch", type="integer", nullable=false)
     */
    private $batch;


}
