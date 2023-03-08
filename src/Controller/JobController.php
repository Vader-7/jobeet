<?php

namespace App\Controller;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobController extends AbstractController
{
    /**
     * Lists all job entities.
     *
     * @Route("/", name="job.list", methods="GET")
     */
    public function list(EntityManagerInterface $em) : Response
    {
    $query = $em->createQuery(
        'SELECT j FROM App:Job j WHERE j.expiresAt > :date'
    )->setParameter('date', new \DateTime());
    $jobs = $query->getResult();

    return $this->render('job/list.html.twig', [
        'jobs' => $jobs,
        ]);
    }   
    /**
     * Finds and displays a job entity.
     *
     * @Route("job/{id}", name="job.show", methods="GET", requirements={"id" = "\d+"})
     */
    public function show(Job $job) : Response
    {
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }
}