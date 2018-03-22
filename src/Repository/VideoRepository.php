<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Repository\Interfaces\VideoRepositoryInterface;

/**
 * Class VideoRepository.
 */
class VideoRepository extends EntityRepository implements VideoRepositoryInterface
{
    /**
     * @param $id
     *
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
