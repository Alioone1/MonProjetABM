<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * Class Truc
 * @package App\Entity
 * @Entity
 * @ORM\Table(name="trucs")
 */


class Truc
{
/**
 * @var int
 * @ORM\Column(name="id", type="integer")
 * @ORM\Id()
 */
public  $identifiant;

/**
 * @var string
 * @ORM\Column(name="chose", type="string")
 */
public  $monTexte;
}