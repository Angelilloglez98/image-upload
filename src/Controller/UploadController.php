<?php
    namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UploadController extends AbstractController
{
    #[Route(path: '/upload', name: 'upload', methods: ['POST'])]
    public function upload(Request $request, EntityManagerInterface $Em)
    {
        // Se coge el objeto que se le pasa por el js 

        $files = $request->files->get('files');
        
        foreach ($files as $file) {
            
            if ($file) {
                $nombreArchivo = md5(uniqid()) . '.' . $file->guessExtension();
                // Se sube a directorio ese archivo con un nombre especifico
                $file->move($this->getParameter('brochures_directory'), $nombreArchivo);
                
            } else {
                return new JsonResponse(['error' => 'No se ha enviado ningún archivo'], 400);
            }
            
        }
        return new JsonResponse(['mensaje'=> '/picture/'.$nombreArchivo]);
    }
}
?>