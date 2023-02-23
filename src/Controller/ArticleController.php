<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use Doctrine\Persistence\ManagerRegistry;


class ArticleController extends AbstractController
{
    #[Route('/getarticle', name: 'getarticle')]
    public function getarticle(ArticleRepository $repo ): Response
    {
        return $this->render('article/liste.html.twig', [
            'articles' => $repo->findAll(),
        ]);
    }
    #[Route('/remove/{id}', name: 'remove3')]
    public function remove(ManagerRegistry $mr ,$id, ArticleRepository $repo): Response
    { // supp id min function w naaweth b Article $a 
        $a=$repo->find($id);
       $em=$mr->getManager();
       $em->remove($a);
       $em->flush();
       //$repo remove($a) y3awtgh les 3 ligne de em 
       return new Response('removed');
        
    }
}
