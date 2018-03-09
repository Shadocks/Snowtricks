<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class TrickRepository
 * @package App\Repository\TrickRepository
 */
class TrickRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAllTrick()
    {
        return $this->createQueryBuilder('t')
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @param $id
     * @return array
     */
    public function findOneTrickBy($id)
    {
        return $this->createQueryBuilder('t')
                    ->where('t.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOneByIdJoinToCommentsPicturesVideos($id)
    {
        return $this->createQueryBuilder('t')
                    ->where('t.id = :id')
                    ->setParameter('id', $id)
                    ->leftJoin('t.comment', 'c')
                    ->leftJoin('t.picture', 'p')
                    ->leftJoin('t.video', 'v')
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOneByIdJoinToPicturesVideos($id)
    {
        return $this->createQueryBuilder('t')
            ->where('t.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('t.picture', 'p')
            ->leftJoin('t.video', 'v')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
