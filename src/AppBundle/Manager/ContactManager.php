<?php

namespace AppBundle\Manager;


use Doctrine\ORM\EntityManager;

class ContactManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findAll() {
        $repo = $this->em->getRepository('AppBundle:Contact');
        return $repo->findAll();
    }
}