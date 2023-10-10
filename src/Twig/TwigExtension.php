<?php
    namespace App\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
    use Twig\TwigFunction;

    class TwigExtension extends AbstractExtension
    {
        public $entityManager;

        public function __construct(EntityManagerInterface $em) {
            $this->entityManager = $em;
        }

        public function getFunctions(): array
        {
            return [
                new TwigFunction('Search', [$this, 'Search']),
            ];
        }

        public function Search($class)
        {   
            $repo= $this->entityManager->getRepository($class);
            $res = $repo->findAll();
            return $res;
        }

    }
?>