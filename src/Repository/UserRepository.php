<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Repository\Interfaces\UserRepositoryInterface;

/**
 * Class UserRepository.
 */
class UserRepository extends EntityRepository implements UserRepositoryInterface
{
    /**
     * @param $token
     *
     * @return mixed
     */
    public function findUserByToken($token)
    {
        return $this->createQueryBuilder('u')
                    ->where('u.validationToken = :validationToken')
                    ->setParameter('validationToken', $token)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param $username
     *
     * @return mixed
     */
    public function findUserByUserName($username)
    {
        return $this->createQueryBuilder('u')
                    ->where('u.username = :username')
                    ->setParameter('username', $username)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param $resetToken
     *
     * @return mixed
     */
    public function findUserByResetToken($resetToken)
    {
        return $this->createQueryBuilder('u')
                    ->where('u.resetToken = :resetToken')
                    ->setParameter('resetToken', $resetToken)
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}
