<?php

namespace App\Entity;

use App\Entity\Interfaces\VideoInterface;

/**
 * Class Video.
 */
class Video implements VideoInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var Trick
     */
    private $trick;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return Trick
     */
    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    /**
     * @param Trick $trick
     */
    public function setTrick(Trick $trick = null)
    {
        $this->trick = $trick;
    }
}
