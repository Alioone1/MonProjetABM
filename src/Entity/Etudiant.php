<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * Mettre commentaires
 * Ne pas nommer "id_..." un objet qui n'est pas un id
 * Factory crée des objets de manière différente
 * Visitor
 * itérateur => parcours un objet. mieux car même si objet change, le programme marche tjrs
 */

/**
 * Class Etudiant
 * @package App\Entity
 * @Entity
 * @ORM\Table(name="etudiants")
 */


class Etudiant
{
/**
 * @var int
 * @ORM\Column(name="id", type="integer")
 * @ORM\Id()
 */
public  $identifiant;

/**
 * @var string
 * @ORM\Column(name="nom", type="string")
 */


public  $nom;

    /**
     * @var Promo/null
     * @ORM\ManyToOne(targetEntity=Promo::class, fetch="EAGER", inversedBy="ListeEtudiants")
     * @ORM\JoinColumn(name="promo_id", referencedColumnName="promo")
     */

    public $promo;

    /**
     * @var Promo/null
     * @ORM\Column(name="promo_id", type="integer")
     * @param string $nom
     * @param integer $id
     * @param integer $promo_id
     *
     */

    public $etudiant;


    public function __construct(text $nom, int $identifiant, int $etudiant)
    {
        $this-> nom = $nom;
        $this-> id = $identifiant;
        $this-> id_promo = $etudiant;

    }

}