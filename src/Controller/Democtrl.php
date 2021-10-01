<?php

namespace App\Controller;

use App\Entity\Truc;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Democtrl extends AbstractController
{
    /**
     * @return Response
     *
     * @Route(path="/demo")
     */
    public function demo(EntityManagerInterface $em)
    {
        $trucs = $em->getRepository(Truc::class)->findAll();
        return new Response('Il y a'.count($trucs).'trucs dans la table');
    }
}