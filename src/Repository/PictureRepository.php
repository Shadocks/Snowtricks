<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class PictureRepository
 * @package App\Repository
 */
class PictureRepository extends EntityRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function findOnePictureBy($id)
    {
        return $this->createQueryBuilder('p')
                    ->where('p.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}
