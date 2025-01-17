<?php
namespace App\Controller;

use App\Entity\Imagen;
use App\Entity\Asociado;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;


class ProyectoController extends AbstractController
{
    #[Route('/', name: 'sym_index')]
    public function index()
    {
        $imagenesHome = [];
        for ($i = 1; $i <= 12; $i++) {
            $imagen = new Imagen();
            $imagen->setNombre("$i.jpg")
                ->setDescripcion("descripción imagen $i")
                ->setCategoria(1)
                ->setNumVisualizaciones(rand(1, 500))
                ->setNumLikes(rand(1, 700))
                ->setNumDownloads(rand(100, 200));

            $imagenesHome[] = $imagen;
        }
        $idCategoria = 1;
        return $this->render('index.view.html.twig', [
            'imagenes' => $imagenesHome,
            'idCategoria' => $idCategoria
        ]);
    }

    // #[Route('/', name: 'sym_index')]
    // public function index(ManagerRegistry $doctrine): Response
    // {
    //     $imagenesHome = $doctrine->getRepository(Imagen::class)->findAll();
    //     $idCategoria = 1;
    //     return $this->render('index.view.html.twig', [
    //         'imagenes' => $imagenesHome,
    //         'idCategoria' => $idCategoria
    //     ]);
    // }

    #[Route('/about', name: 'sym_about')]
    public function about()
    {
        return $this->render('about.view.html.twig');
    }

    
    #[Route('/blog', name: 'sym_blog')]
    public function blog()
    {
        return $this->render('blog.view.html.twig');
    }

    
    #[Route('/contact', name: 'sym_contact')]
    public function contact()
    {
        return $this->render('contact.view.html.twig');
    }

    
    #[Route('/galeria', name: 'sym_galeria')]
    public function galeria()
    {
        return $this->render('galeria.view.html.twig');
    }

    
    #[Route('/asociados', name: 'sym_asociados')]
    public function asociados()
    {
        return $this->render('prueba1.html.twig');
    }

}