<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Societe;
use AppBundle\Repository\SocieteRepository;
use Doctrine\ORM\EntityManager;

class SocieteManager
{
    /**
     *
     * @var EntityManager
     */
    protected $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * 
     * @return SocieteRepository
     */
    protected function getRepository()
    {
        return $this->em->getRepository(Societe::class);
    }
    
    public function getAll()
    {
        return $this->getRepository()->findAll();
    }
    
    public function getById($id)
    {
        return $this->getRepository()->find($id);
    }
}
