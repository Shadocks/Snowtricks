<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class VideoRepository
 * @package App\Repository
 */
class VideoRepository extends EntityRepository
{
    /**
     * @param $id
     * @return array
     */
    public function findOneVideoBy($id)
    {
        return $this->createQueryBuilder('v')
                    ->where('v.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}
