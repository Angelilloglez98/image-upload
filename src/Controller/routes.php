<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class routes extends AbstractController
{
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function index(): Response
    {
    
       return $this->render('base.html.twig',[
        
       ]);
       
    }
    
}