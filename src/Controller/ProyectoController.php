<?php
namespace App\Controller;

use App\Entity\Imagen;
use App\Entity\Asociado;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ProyectoController extends AbstractController
{
    #[Route('/', name: 'sym_index')]
    public function index()
    {   
        for ($i = 1; $i <= 12; $i++) {
            $imagenesHome[] = new Imagen(
                "$i.jpg",
                "descripción imagen $i",
                1,
                rand(1, 500),
                rand(1, 700),
                rand(100, 200)
            );
        }
        
        $asociados = [
            new Asociado('Socio 1', 'log1.jpg', 'Descripción del Socio 1'),
            new Asociado('Socio 2', 'log2.jpg', 'Descripción del Socio 2'),
            new Asociado('Socio 3', 'log3.jpg', 'Descripción del Socio 3')
        ];

        $idCategoria = 1;
        $asociadosAleatorios = array_slice($asociados, 0, 3);

        return $this->render('index.view.html.twig', [
            'imagenes' => $imagenesHome,
            'asociadosAleatorios' => $asociadosAleatorios,
            'idCategoria' => $idCategoria
        ]);
    }


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