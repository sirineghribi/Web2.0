<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudenttRepository;

class StudenttController extends AbstractController
{
    #[Route('/getstudentt', name: 'getstudentt')]
    public function getstudentt(StudenttRepository $repo): Response
    {
        return $this->render('studentt/listt.html.twig', [
            'stu' => $repo->findAll(),
        ]);
    }
}
