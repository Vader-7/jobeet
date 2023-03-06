<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Job;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class JobController extends AbstractController
{
    /**
     * Lists all job entities.
     *
     * @Route("/", name="job.list", methods="GET")
     */
    public function list(EntityManagerInterface $em): Response
    {
        $categories = $em->getRepository(Category::class)->findWithActiveJobs();

        return $this->render("job/list.html.twig", [
            "categories" => $categories,
        ]);
    }
    /*public function list(ManagerRegistry $doctrine) : Response
    {
        $jobs = $doctrine->getRepository(Job::class)->findAll();

        return $this->render('job/list.html.twig', [
            'jobs' => $jobs,
        ]);
    }*/

    /**
     * Finds and displays a job entity.
     *
     * @Route("job/{id}", name="job.show", methods="GET", requirements={"id" = "\d+"})
     */
    public function show(Job $job): Response
    {
        return $this->render("job/show.html.twig", [
            "job" => $job,
        ]);
    }
}
