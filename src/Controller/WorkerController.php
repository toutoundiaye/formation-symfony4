<?php

namespace App\Controller;

use App\Entity\Worker;
use App\Form\WorkerType;
use App\Repository\WorkerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/worker")
 */
class WorkerController extends Controller
{
    /**
     * @Route("/")
     * @param WorkerRepository $repository
     * @return Response
     */
    public function index(WorkerRepository $repository)
    {
        return $this->render('worker/index.html.twig', [
            'workers' => $repository->findAll(),
        ]);
    }

    /**
     * @Route("/create")
     * @Method({"GET", "PUT"})
     */
    public function create(
        Request $request,
        EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(WorkerType::class, new Worker(), [
            'method' => 'PUT',
        ]);

        //Si on fait appel au createFormBuilder
       /* $form = $this
            ->createFormBuilder(new Worker(), [
                'method' => 'PUT',
                'label_format' => 'worker.%name%',
                'translation_domain' => 'worker',
            ])
            ->add('lastName')
            ->add('firstName')
            ->add('jobTitle')
            ->add('workingTime')
            ->add('wage')
            ->getForm();*/

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$form->getData() renvoie un worker vu que
            // $form a été créé selon ce modèle
           $manager->persist($form->getData());
           $manager->flush();

           $this->addFlash('success', 'worker.flash.saved');
           return $this->redirectToRoute('app_worker_index');
        }

        return $this->render('worker/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}")
     * @Method({"GET", "POST"})
     */
    public function edit(
        Worker $worker,
        Request $request,
        EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(WorkerType::class, $worker);

        //Si on fait appel au formBuilder
        /*$form = $this
            ->createFormBuilder($worker, [
                'label_format' => 'worker.%name%',
                'translation_domain' => 'worker',
            ])
            ->add('lastName')
            ->add('firstName')
            ->add('jobTitle')
            ->add('workingTime')
            ->add('wage')
            ->getForm();*/

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('success', 'worker.flash.edited');
            return $this->redirectToRoute('app_worker_index');
        }

        return $this->render('worker/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}")
     * @Method("DELETE")
     */
    public function delete(
        Worker $worker,
        EntityManagerInterface $manager): Response
    {
            $manager->remove($worker);
            $manager->flush();

            $this->addFlash('success', 'worker.flash.deleted');
            return $this->redirectToRoute('app_worker_index');
    }
}
