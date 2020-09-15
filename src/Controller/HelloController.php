<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello", requirements={"name"="[a-z]{3,8}"})
     */
    public function index($name = 'marine')
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'name' => ucfirst($name), 
        ]);
    }

    /*
    * @Route("/hello.{_format}")
    */
    public function ajax() {
        $products = ['A', 'B', 'C'];

        return new Response(json_encode($products));
    }

    /*
    * @Route("/url")
    */
    public function url() {
        //Générer une URL
        $url = $this->generateUrl('hello', [], UrlGeneratorInterface::ABSOLUTE_URL);
        dump($url);

        throw $this->createNotFoundException();
    }

    /**
     * @Route("/dummy.pdf")
     */
    public function myPdf(Request $request) { //Request permet de typer 
        // Récupérer la request
        $code = $request->query->get('code'); // $_GET['code'] en PHP
        dump($code);
        // On regarde si le paramètre ?code= est présent
        // S'il est présent et qu'il correspond à la valeur 123, on affiche le PDF
        // S'il n'est pas présent ou différent de 123, on affiche une 404  
        
        if($code !== '123') {
           throw $this->createNotFoundException();
        }     

        return $this->file('../dummy.pdf', null, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
