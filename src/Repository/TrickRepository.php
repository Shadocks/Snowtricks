<?php

namespace App\Repository;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityRepository;
use App\Repository\Interfaces\TrickRepositoryInterface;

/**
 * Class TrickRepository.
 */
class TrickRepository extends EntityRepository implements TrickRepositoryInterface

{
    /**
     * @return array
     */
    public function findAllTrick()
    {
        return $this->createQueryBuilder('t')
                    ->leftJoin('t.picture', 'p')
                    ->orderBy('t.id', 'DESC')
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @param $id
     *
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
     *
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
     *
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
