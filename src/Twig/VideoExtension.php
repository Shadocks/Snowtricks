<?php

namespace App\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class VideoExtension
 * @package App\Twig
 */
class VideoExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('urlVideoPlay', [
                $this, 'playFilter'
            ])
        ];
    }

    /**
     * @param string $url
     * @return mixed
     */
    public function playFilter(string $url)
    {
        $host = $this->hostSearch($url);

        switch ($host[0]) {
            case 'youtube':
                $id = substr($url, -11);
                $headingUrl = 'https://www.youtube.com/embed/';
                return $urlVideoPlay = implode([$headingUrl, $id]);
                break;
            case 'dailymotion':
                $id = substr($url, -7);
                $headingUrl = 'https://www.dailymotion.com/embed/video/';
                return $urlVideoPlay = implode([$headingUrl, $id]);
                break;
            case 'vimeo':
                $urlVideoPlay = preg_replace('#(vimeo.com)#', 'player.vimeo.com/video', $url);
                return $urlVideoPlay;
                break;
            default:
                return false;
        }
    }

    /**
     * @param $url
     * @return mixed
     */
    public function hostSearch($url)
    {
        if (preg_match('#youtube#', $url, $matches)) {
            return $matches;
        }

        if (preg_match('#dailymotion#', $url, $matches)) {
            return $matches;
        }

        if (preg_match('#vimeo#', $url, $matches)) {
            return $matches;
        }
    }
}
