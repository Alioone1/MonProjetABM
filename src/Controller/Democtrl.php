<?php

namespace App\Controller;

use App\Entity\Promo;
use App\Entity\Etudiant;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Democtrl extends AbstractController
{
    /**
     * @return Response
     *
     * @Route(path="/demo1")
     * @Route(path="/demo")
     */

    public function demo1(EntityManagerInterface $em)
    {
        $promos = $em->getRepository(Promo::class)->findAll();
        dump($promos);
        return new Response('Il y a  '.count($promos).'  étudiants dans la table');
    }

    /*$promo = new Promo('M1');
    $em->persist($promo);


    $promo->intitule = 'M4';

    $etu = new Etudiant('Julie', $promoM1);
    $em->persist($etu);

    $em->flush();*/

    public function demo(EntityManagerInterface $em)
    {
        $trucs = $em->getRepository(Etudiant::class)->findAll();
        dump($trucs);
        return new Response('Il y a '.count($trucs).' trucs dans la table');
    }

    /**
     *
    *@Route(path="/Etudiant/{id}", methods={"GET"})
     *
     *
     */
public function secondRoute (EntityManagerInterface $em, int $id)
{
    $etu = $em ->getRepository(Etudiant::class)->find($id);
    ##Première méthode
    //$r = '{"nom":"'.$etu->name.'","id"'.$etu->$id.'"}';
    //return new Response('ok');
    ##Afficher chaque étudiant avec son id
    return $this->render('etu.json.twig', ['etudiant'=>$etu]);

}
    /**
     *
     *@Route(path="/Etudiant", methods={"GET"})
     *
     *
     */
    public function troisiemeRoute (EntityManagerInterface $em)
    {
        $liste = $em ->getRepository(Etudiant::class)->findAll();
        //$r = '{"nom":"'.$etu->name.'","id"'.$etu->$id.'"}';
        //return new Response('ok');

        ##Afficher la liste des étudiants
        return $this->render('liste.json.twig', ['liste'=>$liste]);
    }
    /**
     *
     *@Route(path="/Etudiant/{id}", methods={"DELETE"})
     *
     *
     */
    public function quatriemeRoute (EntityManagerInterface $em, int $id)
    {
        $etu = $em ->getRepository(Etudiant::class)->find($id);
        //$r = '{"nom":"'.$etu->name.'","id"'.$etu->$id.'"}';
        //return new Response('ok');

        $em->remove($etu);
        $em->flush();
        return new Response('ok');
    }

    /**
     *
     *@Route(path="/Etudiant/{id}", methods={"PUT"})
     *
     *
     */
    public function cinquiemeRoute (Request $request, EntityManagerInterface $em, $id)
    {
        $data = json_decode($request->getContent());
        $etu = $em ->getRepository(Etudiant::class)->find($id);
        //$r = '{"nom":"'.$etu->name.'","id"'.$etu->$id.'"}';
        //return new Response('ok');
        $etu->nom =$data->nom;
        ##Afficher la liste des étudiants
        return $this->render('etu.json.twig', ['etudiant'=>$etu]);
    }

}