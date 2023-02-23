<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistory;
use App\Entity\Product;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
    #[Route('/fetchproduct', name: 'fetchproduct')]
    public function fetchproduct(ManagerRegistry $mr): Response
    { $products=$mr->getRepository(Product::class);
        $result=$products->findAll();
        dd($result);
        return $this->render('product/list.html.twig', [
            'controller_name' => 'ProductController',
            'p'=>$result,
        ]);
    }
    
}
