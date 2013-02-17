<?php

namespace DTL\Bundle\VoyagerBundle\Repository;

use Doctrine\ODM\PHPCR\DocumentRepository;

class StageRepository extends DocumentRepository
{
    public function findBySlug($slug)
    {
        $qb = $this->createQueryBuilder();
        $qb->where($qb->expr()->eq('slug', $slug));
        $qb->setMaxResults(1);
        $q = $qb->getQuery();
        return $q->getSingleResult();
    }
}
