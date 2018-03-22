<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Repository\Interfaces\PictureRepositoryInterface;

/**
 * Class PictureRepository.
 */
class PictureRepository extends EntityRepository implements PictureRepositoryInterface
{
    /**
     * @param string $id
     *
     * @return mixed
     */
    public function findOnePictureBy(String $id)
    {
        return $this->createQueryBuilder('p')
                    ->where('p.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}
