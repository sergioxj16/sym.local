<?php

namespace App\Controller;

use App\Entity\Imagen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;

class ImagenController extends AbstractController
{
    #[Route('/imagen', name: 'sym_imagen')]
    public function index1(ManagerRegistry $doctrine): Response
    {
        $imagenes = $doctrine->getRepository(Imagen::class)->findAll();
        return $this->render('imagen/index.html.twig', [
            'imagenes' => $imagenes
        ]);
    }

    #[Route('/', name: 'sym_index')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $imagenesHome = $doctrine->getRepository(Imagen::class)->findAll();
        $idCategoria = 1;
        return $this->render('index.view.html.twig', [
            'imagenes' => $imagenesHome,
            'idCategoria' => $idCategoria
        ]);
    }

}