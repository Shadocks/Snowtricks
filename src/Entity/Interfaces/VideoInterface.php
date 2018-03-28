<?php

namespace App\Entity\Interfaces;

use App\Entity\Trick;

/**
 * Interface VideoInterface.
 */
interface VideoInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getUrl(): ?string;

    /**
     * @param $url
     */
    public function setUrl(string $url);

    /**
     * @return Trick
     */
    public function getTrick(): ?Trick;

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick = null);
}
