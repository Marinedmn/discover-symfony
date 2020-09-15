<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{
    /** 
    * @Route("/")
    */
    public function index(Request $request) {

        dump('toto');
        dump($request);

        $name = 'Marine';

        // return new Response('<body>Accueil</body>');
        return $this->render('home.html.twig', [
            'name' => $name,
        ]);
    }
}