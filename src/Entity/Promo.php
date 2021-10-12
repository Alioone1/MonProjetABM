<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * Class Promo
 * @package App\Entity
 * @Entity
 * @ORM\Table(name="promos")
 */

class Promo
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     */

    public $id;

    /**
     * @var text
     * @ORM\Column(name="promo", type="text")
     */
    public $mapromo;


    /**
     * @var Promo/null
     * @ORM\OneToMany(targetEntity=Etudiant::class, fetch="EAGER", mappedBy="promo")
     * @ORM\JoinColumn(name="")
     */

    public $ListeEtudiants;


    public function __construct(text $nom, int $mapromo)
    {
        $this-> nom = $nom;
    $this-> promo = $mapromo;}
}

/*Pour créer une liste//

/**
 * @var Collection
 * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="promo", fetch="EAGER")

public Collection $listeEtudiants*/