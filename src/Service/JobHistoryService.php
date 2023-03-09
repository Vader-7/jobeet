<?php

namespace App\Service;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class JobHistoryService
{
    private const MAX = 3;

    /** @var SessionInterface */
    private $session;

    /** @var EntityManagerInterface */
    private $em;

    /**
     * @param SessionInterface $session
     * @param EntityManagerInterface $em
     */
    public function __construct(SessionInterface $session, EntityManagerInterface $em)
    {
        $this->session = $session;
        $this->em = $em;
    }

    /**
     * @param Job $job
     *
     * @return void
     */
    public function addJob(Job $job) : void
    {
        // add job to session
    }

    /**
     * @return Job[]
     */
    public function getJobs() : array
    {
        // get jobs from session
    }
}   