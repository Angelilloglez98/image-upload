<?php
    namespace App\Controller;

    use App\Entity\Pictures;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;


    class upload extends AbstractController
    {
        #[Route(path: '/upload', name: 'upload', methods: ['POST'])]
        public function Upload(Request $request, EntityManagerInterface $em)
        {
            $file = $request->files->get('file');
            $label = $request->request->get('label');
            

            if ($file) {

                $newFilename = uniqid().'.'.$file->guessExtension();
                $file->move($this->getParameter('brochures_directory'),$newFilename);

                $picture=new Pictures();
                $picture->setUrl($newFilename);
                if ($label) {
                    $picture->setLabel($label);
                }
                $em->persist($picture);
                $em->flush();
                return new JsonResponse(["msg"=>"se ha movido correctamente"]);
            }else{
                return new JsonResponse(["msg"=>"No se ha movido correctamente"]);
            }

        }
    }

?>