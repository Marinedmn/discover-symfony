<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{
    /** 
    * @Route("/")
    */
    public function index(Request $request, LoggerInterface $logger, SessionInterface $session) {

        dump('toto');
        dump($request);

        $name = 'Marine';

        dump($logger);
        $logger->info('Ok test');
        $session-> set('user', 'toto') ;

        // return new Response('<body>Accueil</body>');
        return $this->render('home.html.twig', [
            'name' => $name,
        ]);
    }
}