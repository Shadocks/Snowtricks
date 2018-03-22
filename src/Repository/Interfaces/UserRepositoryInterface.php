<?php

namespace App\Repository\Interfaces;

/**
 * Interface UserRepositoryInterface.
 */
interface UserRepositoryInterface
{
    /**
     * @param $token
     *
     * @return mixed
     */
    public function findUserByToken($token);

    /**
     * @param $username
     *
     * @return mixed
     */
    public function findUserByUserName($username);

    /**
     * @param $resetToken
     *
     * @return mixed
     */
    public function findUserByResetToken($resetToken);
}
