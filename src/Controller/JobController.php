<?php

namespace App\Controller;


use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/job")
 */
class JobController extends Controller
{
    /**
     * @Route("/")
     */
    public function index(JobRepository $repository)
    {
        $form = $this
            ->createFormBuilder(null, [
                'method' => 'DELETE'])
            ->getForm();

        return $this->render('job/index.html.twig', [
            'jobs' => $repository->findAll(),
            'form' => $form->createView(),
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
        $form = $this->createForm(JobType::class, new Job(), [
            'method' => 'PUT',
        ]);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->persist($form->getData());
            $manager->flush();

            $this->addFlash('success', 'job.flash.saved');
            return $this->redirectToRoute('app_job_index');
        }

        return $this->render('job/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}")
     * @Method({"GET", "POST"})
     */
    public function edit(
        Job $job,
        Request $request,
        EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash('success', 'job.flash.edited');
            return $this->redirectToRoute('app_job_index');
        }

        return $this->render('job/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}")
     * @Method("DELETE")
     */
    public function delete(
        Job $job,
        EntityManagerInterface $manager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Only admin can delete a job');

        $manager->remove($job);
        $manager->flush();

        $this->addFlash('success', 'job.flash.deleted');
        return $this->redirectToRoute('app_job_index');
    }
}
