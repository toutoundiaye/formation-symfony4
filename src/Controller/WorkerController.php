<?php

namespace App\Controller;

use App\Repository\WorkerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorkerController extends Controller
{
    /**
     * @Route("/worker")
     */
    public function index(WorkerRepository $repository)
    {
        return $this->render('worker/index.html.twig', [
            'workers' => $repository->findAll(),
        ]);
    }
}
