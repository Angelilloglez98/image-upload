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
        $uploadMaxFilesize = ini_get('upload_max_filesize');
        $postMaxSize = ini_get('post_max_size');
       return $this->render('base.html.twig',[
        'uploadMaxFilesize' => $uploadMaxFilesize,
        'postMaxSize' => $postMaxSize,
       ]);
       
    }
    

    #[Route('/picture/{slug}', name: 'show')]
    public function action($slug): Response
    {
        return $this->render('/show/base.html.twig',[
            'image'=>$slug
        ]);
    }
    
}